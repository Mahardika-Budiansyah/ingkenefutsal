@extends('user.layouts.mainlayouts')

@section('title', 'Detail Lapangan')
@section('content')

    @include('user.partials.jumbotronDashboard')

    <style>
        /* Add your custom styles here */
        .selected-day {
            background-color: #4dc0b5 !important;
            /* Light Teal color for selected day */
            color: white !important;
            /* White text color for selected day */
        }

        /* Set the height and width of each day element */
        .day {
            width: 70px;
            /* Adjust the width as needed */
            cursor: pointer;
            /* Add cursor style to indicate clickability */
            transition: opacity 0.3s ease-in-out;
            /* Add a transition effect for opacity */
        }

        .day.disabled {
            opacity: 0.5;
            /* Reduce opacity for disabled dates */
            pointer-events: none;
            /* Disable pointer events for past dates */
        }

        .selected-day-name {
            color: white !important;
            /* White text color for the selected day name */
        }

        .added-to-cart {
            background-color: #4dc0b5 !important;
            color: white !important;
        }
    </style>

    <div class="max-w-screen-lg mx-auto px-6 py-12">
        <div class="flex gap-4">
            <div></div>
            <img class="h-auto w-full lg:w-[620px] pr-6 lg:p-0 rounded-lg"
                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            <div class="flex flex-col gap-4" style="flex: 1;">
                <img class="h-full w-auto rounded-lg hidden lg:block"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                <img class="h-full w-auto rounded-lg hidden lg:block"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 py-12 text-center sm:text-left">
            <div class="mb-4 sm:mb-0 basis-9/12">
                <input type="text" name="field_id" hidden>
                <div class="py-2">
                    <h1 class="text-3xl font-bold">{{ $fields->id }}</h1>
                </div>
                <div class="py-2">
                    <h1 class="text-3xl font-bold">{{ $fields->name }}</h1>
                </div>
                <div class="py-2">
                    <span class="text-xs font-normal px-2 py-[4px] bg-teal-600 text-white rounded-md">
                        {{ $fields->fieldtypes->name }}
                    </span>
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
                    <span class="text-xs">Mulai dari</span>
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
            <button id="prevBtn" class="bg-teal-600 hover:bg-teal-700 text-white px-2 py-2 rounded-md hidden lg:block"><i
                    class="fas fa-chevron-left"></i></button>
            <div class="mx-2 flex overflow-x-auto text-center" id="calendarContainer">
                <!-- Content will be added dynamically here -->
            </div>
            <button id="nextBtn" class="bg-teal-600 hover:bg-teal-700 text-white px-2 py-2 rounded-md hidden lg:block"><i
                    class="fas fa-chevron-right"></i></button>
            <input type="date" id="selectSpecificDateInput"
                class="mx-1 lg:mx-4 bg-white text-xs font-semibold text-gray-800 px-4 py-2 rounded-md border-gray-100 hover:border-gray-200">
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div
                class="mx-2 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-2 text-center text-xs">
                @foreach ($fields->timetables as $item)
                    <button data-timetable-id="{{ $item->id }}"
                        class="add-to-cart-btn py-2 border border-gray-100 rounded-md hover:border-gray-200">
                        <p class="font-bold">{{ $item->name }}</p>
                        <p>@currency($item->pivot->price)</p>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize shopping cart array from localStorage or empty array if not found
            var fieldCart = JSON.parse(localStorage.getItem('fieldCart')) || [];
    
            // Parse the stringified dates back to Date objects
            fieldCart.forEach(item => {
                if (item.addedDate) {
                    item.addedDate = new Date(item.addedDate);
                }
            });
    
            console.log('Initial fieldCart:', fieldCart);
    
            updateCartDisplay();
            
    
            var calendarContainer = document.getElementById('calendarContainer');
            var selectSpecificDateInput = document.getElementById('selectSpecificDateInput');
            var currentDate = new Date();
    
            // Konversi tanggal ke zona waktu Indonesia
            currentDate = new Date(currentDate.toLocaleString('en-US', {
                timeZone: 'Asia/Jakarta'
            }));
            selectSpecificDateInput.valueAsDate = currentDate;
    
            updateCalendar();
    
            document.getElementById('prevBtn').addEventListener('click', function() {
                currentDate.setDate(currentDate.getDate() - 7);
                updateCalendar();
            });
    
            document.getElementById('nextBtn').addEventListener('click', function() {
                currentDate.setDate(currentDate.getDate() + 7);
                updateCalendar();
            });
    
            selectSpecificDateInput.addEventListener('change', function() {
                var newDate = new Date(selectSpecificDateInput.value + 'T00:00:00+07:00');
                currentDate = newDate;
                updateCalendar();
                updateCartDisplay();
                updateTimetableStyles(); // Update styles when the selected date changes
            });
    
            calendarContainer.addEventListener('click', function(event) {
                var clickedDateElement = event.target.closest('.day');
                if (clickedDateElement) {
                    var clickedDate = new Date(clickedDateElement.dataset.date);
                    currentDate = clickedDate;

                    var formattedDateForServer = formatDateForServer(currentDate);
                    selectSpecificDateInput.value = formattedDateForServer;

                    updateCalendar();
                    updateCartDisplay();
                    updateTimetableStyles();
                }
            });
            
    
            function canAddToCart(item) {
                var isAlreadyInCart = fieldCart.some(function(cartItem) {
                    // Check if cartItem has addedDate property and compare it
                    return cartItem.id === item.id &&
                        cartItem.addedDate &&
                        cartItem.addedDate.toISOString &&
                        cartItem.addedDate.toISOString().split('T')[0] === currentDate.toISOString().split(
                            'T')[0];
                });
    
                var isWithinLimit = !isAlreadyInCart;
    
                return isWithinLimit;
            }
    
            function saveCartToLocalStorage() {
                localStorage.setItem('fieldCart', JSON.stringify(fieldCart));
            }
    
            // Function to display item details
            function updateCartDisplay() {
                var cartItemsContainer = document.getElementById('cartItems');
                console.log('Updating cart display...');
                cartItemsContainer.innerHTML = '';
    
                var groupedCartItems = {};
                var totalQuantity = 0;
    
                fieldCart.forEach(function(item) {
                    var key = item.fieldId + '_' + item.addedDate.toISOString().split('T')[0];
    
                    if (!groupedCartItems[key]) {
                        groupedCartItems[key] = {
                            fieldName: item.fieldName,
                            addedDate: item.addedDate,
                            items: [],
                        };
                    }
    
                    groupedCartItems[key].items.push(item);
                    totalQuantity += item.quantity ||
                    1; // Menambahkan quantity setiap item ke totalQuantity
                });
    
                // Update totalQuantity directly in the HTML
                var totalSpan = document.getElementById('totalItemsInCart');
                if (totalSpan) {
                    totalSpan.textContent = totalQuantity;
                }
    
                for (var key in groupedCartItems) {
                    if (groupedCartItems.hasOwnProperty(key)) {
                        var group = groupedCartItems[key];
    
                        var listItem = document.createElement('li');
                        listItem.className = 'flex-col p-2 md:p-3';
    
                        var cartHeader = document.createElement('div');
                        cartHeader.className = 'flex justify-between py-2';
                        var fieldName = document.createElement('h1');
                        fieldName.className = 'text-base font-medium';
                        fieldName.textContent = group.fieldName;
                        var quantity = document.createElement('span');
                        quantity.className = 'text-xs font-bold align-bottom';
                        quantity.textContent = group.items.length;
    
                        cartHeader.appendChild(fieldName);
                        cartHeader.appendChild(quantity);
    
                        listItem.appendChild(cartHeader);
    
                        group.items.forEach(function(item) {
                            var cartItemDetails = document.createElement('div');
                            cartItemDetails.className =
                                'flex justify-between py-2 px-2 my-2 border-l-4 border-teal-600 bg-teal-100 text-base font-normal';
    
                            var detailsLeft = document.createElement('div');
                            detailsLeft.className = 'flex-row';
                            var date = document.createElement('span');
                            date.className = 'text-sm font-medium text-left';
                            date.textContent = formatDate(item.addedDate);
                            var time = document.createElement('span');
                            time.className = 'text-sm font-medium text-left pl-2';
                            time.textContent = item.name;
                            var price = document.createElement('p');
                            price.className = 'text-sm font-normal text-left';
    
                            var floatPrice = parseFloat(item.pivot.price);
                            price.textContent = 'Rp. ' + floatPrice.toLocaleString('id-ID');
    
                            detailsLeft.appendChild(date);
                            detailsLeft.appendChild(time);
                            detailsLeft.appendChild(price);
    
                            var detailsRight = document.createElement('div');
                            detailsRight.className = 'ml-10 pt-2 px-2 justify-center text-center';
                            var deleteLink = document.createElement('a');
                            deleteLink.href = '#'; // Use # as a placeholder for now
                            deleteLink.addEventListener('click', function(event) {
                                event.preventDefault();
                                removeFromCart(item);
                                updateCartDisplay();
                                updateTimetableStyles
                            (); // Update styles when an item is removed from the cart
                            });
    
                            var deleteIcon = document.createElement('i');
                            deleteIcon.className = 'fas fa-trash text-teal-600';
    
                            deleteLink.appendChild(deleteIcon);
                            detailsRight.appendChild(deleteLink);
    
                            cartItemDetails.appendChild(detailsLeft);
                            cartItemDetails.appendChild(detailsRight);
    
                            listItem.appendChild(cartItemDetails);
                        });
    
                        // Add "Selanjutnya" button after each date
                        var nextButton = document.createElement('button');
                        nextButton.type = 'button';
                        nextButton.className =
                            'text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center';
                        nextButton.textContent = 'Selanjutnya';
    
                        listItem.appendChild(nextButton);
    
                        cartItemsContainer.appendChild(listItem);
                    }
                }
    
                saveCartToLocalStorage();
            }
    
            function removeFromCart(item) {
                var index = fieldCart.findIndex(function(cartItem) {
                    return (
                        cartItem.fieldId === item.fieldId &&
                        cartItem.id === item.id &&
                        cartItem.addedDate.toISOString().split('T')[0] === item.addedDate.toISOString()
                        .split('T')[0]
                    );
                });
    
                if (index !== -1) {
                    fieldCart.splice(index, 1);
                }
            }
    
            function formatDate(date) {
                var day = date.getDate();
                var month = date.toLocaleString('id-ID', {
                    month: 'short'
                });
                var year = date.getFullYear();
                return day + ' ' + month + ' ' + year;
            }
    
            function formatDateForServer(date) {
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                return year + '-' + month + '-' + day;
            }
    
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
                for (var current_date = new Date(start_date); current_date <= end_date; current_date.setDate(
                        current_date.getDate() + 1)) {
                    var is_disabled = current_date < today; // Disable past dates
                    var is_selected = current_date.toISOString().split('T')[0] === currentDate.toISOString().split(
                        'T')[0]; // Check if it's selected
                    var is_today = current_date.toISOString().split('T')[0] === today.toISOString().split('T')[
                        0]; // Check if it's today
    
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
                <p class="text-xs font-semibold date">${formatDate(current_date)}</p>
            `;
    
                    // Append the day element to the calendar container
                    calendarContainer.appendChild(dayElement);
                }
            }
    
            function updateTimetableStyles() {
                var timetableButtons = document.querySelectorAll('.add-to-cart-btn');
    
                timetableButtons.forEach(function(button) {
                    var timetableId = button.dataset.timetableId;
                    var timetable = findTimetableById(timetableId);
    
                    // Check if the timetable is in the cart for the current date
                    var isTimetableInCart = timetable && fieldCart.some(item =>
                        item.id === timetable.id &&
                        item.fieldId === '{{ $fields->id }}' &&
                        item.addedDate &&
                        item.addedDate.toISOString().split('T')[0] === currentDate.toISOString().split(
                            'T')[0]
                    );
    
                    if (isTimetableInCart) {
                        button.classList.add('added-to-cart');
                    } else {
                        button.classList.remove('added-to-cart');
                    }
                });
            }

            document.addEventListener('click', function(event) {
                var addToCartButton = event.target.closest('.add-to-cart-btn');
                if (addToCartButton) {
                    var timetableId = addToCartButton.dataset.timetableId;
                    var selectedTimetable = findTimetableById(timetableId);

                     // Add the selected date to the timetable
                    selectedTimetable.selectedDate = formatDate(currentDate);

                    // Menambahkan ID lapangan ke dalam objek item
                    selectedTimetable.fieldId = '{{ $fields->id }}';
                    selectedTimetable.fieldName = '{{ $fields->name }}';

                    if (selectedTimetable && canAddToCart(selectedTimetable)) {
                        addToCart(selectedTimetable);
                        updateCartDisplay();
                        updateTimetableStyles();
                    }
                }

            });
    
            function findTimetableById(timetableId) {
                return {!! json_encode($fields->timetables) !!}.find(function(timetable) {
                    return timetable.id == timetableId;
                });
            }
    
            function addToCart(item) {
                item.addedDate = new Date(currentDate.getTime());
                fieldCart.push(item);

                // Add the class to the selected timetable button
                var timetableButton = document.querySelector(`.add-to-cart-btn[data-timetable-id="${item.id}"]`);
                if (timetableButton) {
                    timetableButton.classList.add('added-to-cart');
                }

                // Save the updated shopping cart to localStorage
                saveCartToLocalStorage();

                // Update styles immediately after adding to cart
                updateTimetableStyles();
            }

    
            function saveCartToLocalStorage() {
                localStorage.setItem('fieldCart', JSON.stringify(fieldCart.map(item => ({
                    ...item,
                    addedDate: item.addedDate.toISOString()
                }))));
            }
    
            function saveDataToServer(data) {
                console.log('Mengirim data ke server:', data);
                // Simulasi pengiriman data ke server (Anda perlu menggantinya dengan implementasi sesungguhnya)
                // Di sini, Anda dapat menggunakan fetch atau metode lain untuk mengirim data ke server
            }
        });

        
    </script>

    <script>
        var timetableData = {!! json_encode($fields->timetables) !!};

        function findTimetableById(timetableId) {
            return timetableData.find(function(timetable) {
                return timetable.id == timetableId;
            });
        }

        // ... (kode JavaScript lainnya)
    </script>

    {{-- <script src="{{ asset('build/assets/js/ingkenefutsal/detailField.js') }}" defer></script> --}}


@endsection
