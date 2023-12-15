@extends('user.layouts.mainlayouts')

@section('title', 'Detail Lapangan')
@section('content')

@include('user.partials.jumbotronDashboard')

    <style>
        /* Add your custom styles here */
        .selected-day {
            background-color: #4dc0b5 !important; /* Light Teal color for selected day */
            color: white !important; /* White text color for selected day */
        }

        /* Set the height and width of each day element */
        .day {
            width: 70px; /* Adjust the width as needed */
            cursor: pointer; /* Add cursor style to indicate clickability */
            transition: opacity 0.3s ease-in-out; /* Add a transition effect for opacity */
        }

        .day.disabled {
            opacity: 0.5; /* Reduce opacity for disabled dates */
            pointer-events: none; /* Disable pointer events for past dates */
        }

        .selected-day-name {
            color: white !important; /* White text color for the selected day name */
        }
    </style>

    <div class="max-w-screen-lg mx-auto px-6 py-12">            
        <div class="flex gap-4">
            <div>
            </div>
            <img class="h-auto w-full lg:w-[620px] pr-6 lg:p-0 rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            <div class="flex flex-col gap-4" style="flex: 1;">
                <img class="h-full w-auto rounded-lg hidden lg:block" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                <img class="h-full w-auto rounded-lg hidden lg:block" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 py-12 text-center sm:text-left">
            <div class="mb-4 sm:mb-0 basis-9/12">
                <input type="text" name="field_id" hidden>
                <div class="py-2">
                    <h1 class="text-3xl font-bold">{{ $fields->name }}</h1>
                </div>
                <div class="py-2">
                    <span class="text-xs font-normal px-2 py-[4px] bg-teal-600 text-white rounded-md">{{ $fields->fieldtypes->name }}</span>
                </div>
                <div class="py-2 border-b-2 border-gray-300">
                    <p class="text-base font-normal">Alamat</p>
                </div>
                <div class="py-2">
                    <p class="text-base font-normal">{{ $fields->description }}</p>
                </div>
            </div>
            <div class="flex-grow">
                <div class="px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg">
                    <span class="text-xs">
                        Mulai dari
                    </span>
                    <div>
                        <span class="font-bold text-2xl">Rp. 40.000</span>
                        <span class="text-xs">per jam</span>
                    </div>
                    <div class="bg-teal-600 my-2 px-auto py-2 text-white align-center text-center rounded-lg">
                        <a href="">Cek Ketersediaan</a> 
                    </div>
                </div>
            </div>
        </div>
        
        <div class="py-2">
            <h1 class="text-2xl font-bold">Pilih Jadwal</h1>
        </div>
        <!-- Calendar Container -->
        <div class="flex items-center mb-4 bg-white p-4 rounded-lg justify-between lg:justify-center shadow-sm">
            <button id="prevBtn" class="bg-teal-600 hover:bg-teal-700 text-white px-2 py-2 rounded-md hidden lg:block"><i class="fas fa-chevron-left"></i></button>
            <div class="mx-2 flex overflow-x-auto text-center" id="calendarContainer">
                <!-- Content will be added dynamically here -->
            </div>
            <button id="nextBtn" class="bg-teal-600 hover:bg-teal-700 text-white px-2 py-2 rounded-md hidden lg:block"><i class="fas fa-chevron-right"></i></button>
            <input type="date" id="selectSpecificDateInput" class="mx-1 lg:mx-4 bg-white text-xs font-semibold text-gray-800 px-4 py-2 rounded-md border-gray-100 hover:border-gray-200">
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm"> 
            <div class="mx-2 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-2 text-center text-xs">
                @foreach ($fields->timetables as $item)
                <div class="py-2 border border-gray-100 rounded-md hover:border-gray-200">
                    <p class="font-bold">{{ $item->name }}</p>
                    <p> @currency($item->pivot->price)</p>
                </div>
                @endforeach
            </div>   
        </div>
    </div>


@endsection

<!-- Add this script to your HTML file -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarContainer = document.getElementById('calendarContainer');
        var selectSpecificDateInput = document.getElementById('selectSpecificDateInput');
        var currentDate = new Date();

        // Konversi tanggal ke zona waktu Indonesia
        currentDate = new Date(currentDate.toLocaleString('en-US', { timeZone: 'Asia/Jakarta' }));
        selectSpecificDateInput.valueAsDate = currentDate;

        updateCalendar();

        document.getElementById('prevBtn').addEventListener('click', function () {
            currentDate.setDate(currentDate.getDate() - 7); // Move back by one week
            updateCalendar();
        });

        document.getElementById('nextBtn').addEventListener('click', function () {
            currentDate.setDate(currentDate.getDate() + 7); // Move forward by one week
            updateCalendar();
        });

        // Add event listener to update calendar when the input changes
        selectSpecificDateInput.addEventListener('input', function () {
            var newDate = new Date(selectSpecificDateInput.value + 'T00:00:00+07:00'); // UTC+7 for Indonesia
            currentDate = newDate;
            updateCalendar();
        });

        // Add event listener to calendarContainer
        calendarContainer.addEventListener('click', function (event) {
            var clickedDateElement = event.target.closest('.day');
            if (clickedDateElement) {
                var clickedDate = new Date(clickedDateElement.dataset.date);
                currentDate = clickedDate;

                // Format tanggal sesuai dengan input date (YYYY-MM-DD)
                var formattedDate = currentDate.toISOString().split('T')[0];
                selectSpecificDateInput.value = formattedDate;

                updateCalendar();
            }
        });

        function updateCalendar() {
            // Clear previous content
            calendarContainer.innerHTML = '';

            // Set the start and end dates for the calendar
            var start_date = new Date(currentDate);
            var end_date = new Date(currentDate);

            if (window.innerWidth < 768) {
                // Display 3 days before, today, and 3 days after today for mobile screens
                start_date.setDate(currentDate.getDate() - 1); // Display one day before
                end_date.setDate(currentDate.getDate() + 1); // Display one day after
            } else {
                // Display a week for larger screens
                start_date.setDate(currentDate.getDate() - start_date.getDay()); // Move to the first Sunday
                end_date.setDate(start_date.getDate() + 6);
            }

            // Get today's date
            var today = new Date();
            today.setHours(0, 0, 0, 0); // Set time to midnight for accurate comparison

            // Loop through each day and display the date, month, and year in one line
            for (var current_date = new Date(start_date); current_date <= end_date; current_date.setDate(current_date.getDate() + 1)) {
                var is_disabled = current_date < today; // Disable past dates
                var is_selected = current_date.toISOString().split('T')[0] === currentDate.toISOString().split('T')[0]; // Check if it's selected
                var is_today = current_date.toISOString().split('T')[0] === today.toISOString().split('T')[0]; // Check if it's today

                var dayElement = document.createElement('div');
                dayElement.className = 'day p-3 mx-0.5 bg-white border border-transparent rounded-xl';

                if (is_disabled) {
                    dayElement.classList.add('disabled');
                }

                if (is_selected) {
                    dayElement.classList.add('selected-day');
                    dayElement.style.color = 'white';
                }

                dayElement.dataset.date = current_date.toISOString().split('T')[0];

                dayElement.innerHTML = `
                    <p class="text-xs text-gray-600 weekday ${is_selected ? 'selected-day-name' : ''}">${current_date.toLocaleDateString('id-ID', { weekday: 'short' })}</p>
                    <p class="text-xs font-semibold date">${current_date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })}</p>
                `;

                // Append the day element to the calendar container
                calendarContainer.appendChild(dayElement);
            }
        }

        // Update calendar on window resize
        window.addEventListener('resize', function () {
            updateCalendar();
        });
    });
</script>

