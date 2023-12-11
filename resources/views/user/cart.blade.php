<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize shopping cart array from localStorage or empty array if not found
        var shoppingCart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

        // Parse the stringified dates back to Date objects
        shoppingCart.forEach(item => {
            if (item.addedDate) {
                item.addedDate = new Date(item.addedDate);
            }
        });

        console.log('Initial shoppingCart:', shoppingCart);

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

                var formattedDate = formatDate(currentDate);
                selectSpecificDateInput.value = formattedDate;

                updateCalendar();
                updateCartDisplay();
                updateTimetableStyles(); // Update styles when a date is clicked
            }
        });

        function canAddToCart(item) {
            var isAlreadyInCart = shoppingCart.some(function(cartItem) {
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
            localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
        }

        // Function to display item details
        function updateCartDisplay() {
            var cartItemsContainer = document.getElementById('cartItems');
            console.log('Updating cart display...');
            cartItemsContainer.innerHTML = '';

            var groupedCartItems = {};
            var totalQuantity = 0;

            shoppingCart.forEach(function(item) {
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
            var index = shoppingCart.findIndex(function(cartItem) {
                return (
                    cartItem.fieldId === item.fieldId &&
                    cartItem.id === item.id &&
                    cartItem.addedDate.toISOString().split('T')[0] === item.addedDate.toISOString()
                    .split('T')[0]
                );
            });

            if (index !== -1) {
                shoppingCart.splice(index, 1);
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
                var isTimetableInCart = timetable && shoppingCart.some(item =>
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
                if (selectedTimetable && canAddToCart(selectedTimetable)) {
                    selectedTimetable.fieldId = '{{ $fields->id }}';
                    selectedTimetable.fieldName = '{{ $fields->name }}';
                    addToCart(selectedTimetable);
                    updateCartDisplay();
                    updateTimetableStyles(); // Update styles when a timetable is added to the cart
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
            shoppingCart.push(item);

            // Add the class to the selected timetable button
            var timetableButton = document.querySelector(`.add-to-cart-btn[data-timetable-id="${item.id}"]`);
            if (timetableButton) {
                timetableButton.classList.add('added-to-cart');
            }

            // Save the updated shopping cart to localStorage
            saveCartToLocalStorage();
        }

        function saveCartToLocalStorage() {
            localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart.map(item => ({
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