<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ url('build/assets/img/ingkenefutsal/ingkenefutsal-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('build/assets/img/ingkenefutsal/ingkenefutsal-icon.png') }}" />
    <title>Ingkenefutsal Web Magelang | @yield('title') </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../build/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../build/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../build/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{-- <script src="{{ asset('build/assets/js/ingkenefutsal/mainlayoutUser.js') }}" defer></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

    @include('sweetalert::alert')
    @include('user.layouts.partials.navbar')

    @yield('content')

    @include('user.layouts.partials.footer')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize shopping cart array from localStorage or empty array if not found
            var fieldCart = JSON.parse(localStorage.getItem('fieldCart')) || [];
            console.log('Data in localStorage:', fieldCart);
            // Parse the stringified dates back to Date objects
            fieldCart.forEach(item => {
                if (item.addedDate) {
                    item.addedDate = new Date(item.addedDate);
                }
            });

            console.log('Initial fieldCart:', fieldCart);

            updateCartDisplay();

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

                    if (!group && groupedCartItems[key].items.length > 1) {
                        group = groupedCartItems[key];
                        console.log('Updated group:', group);
                    }
                });

                // Update totalQuantity directly in the HTML
                var totalSpan = document.getElementById('totalItemsInCart');
                if (totalSpan) {
                    totalSpan.textContent = totalQuantity;
                }

                for (var key in groupedCartItems) {
                    if (groupedCartItems.hasOwnProperty(key)) {
                        var group = groupedCartItems[key];
                        console.log('Group:', group); // Tambahkan ini

                        // Pastikan 'fieldName' ada di dalam objek 'group' sebelum mengaksesnya
                        if ('fieldName' in group) {
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

                            // ... (sisa kode)
                        } else {
                            console.error("fieldName is not present in group:", group);
                        }

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

                        var nextButton = document.createElement('button');
                        nextButton.type = 'button';
                        nextButton.className =
                            'text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-28 py-2.5 text-center';
                        nextButton.textContent = 'Selanjutnya';

                        // Add click event listener to the button, passing the current group
                        nextButton.addEventListener('click', (function(groupCopy) {
                            return function() {
                                navigateToReviewOrder(groupCopy);
                            };
                        })(Object.assign({}, group)));

                        listItem.appendChild(nextButton);

                        cartItemsContainer.appendChild(listItem);
                    }
                }

                saveCartToLocalStorage();
            }

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            function navigateToReviewOrder(group) {
                console.log('Navigating to review order with group:', group);

                // Encode the data and redirect to the review order page
                var requestData = {
                    cartItems: group.items,
                    // Add other data as needed
                };

                // Fetch CSRF token from meta tag
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Perform an AJAX request to the server to generate a token
                // and retrieve the token from the server response
                fetch('/generate-order-token', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken, // Include CSRF token in the header
                        },
                        body: JSON.stringify(requestData),
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Redirect to the review order page with the token in the URL
                        window.location.href = '/checkout/review-order?token=' + encodeURIComponent(data.token);
                    })
                    .catch(error => {
                        console.error('Error generating order token:', error);
                    });
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

        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Retrieve data from session storage
        //     var reviewOrderData = sessionStorage.getItem('reviewOrderData');
        //     console.log('Review Order Data:', reviewOrderData);

        //     if (reviewOrderData) {
        //         var requestData = JSON.parse(atob(reviewOrderData));
        //         // Use the requestData as needed on the review-order page

        //         // Optional: Clear the session storage after retrieving the data
        //         sessionStorage.removeItem('reviewOrderData');
        //     } else {
        //         console.error('No reviewOrderData found in session storage.');
        //     }
        // });
    </script>

    <!-- plugin for charts  -->
    <script src="../build/assets/js/plugins/chartjs.min.js" async></script>
    <!-- plugin for scrollbar  -->
    <script src="../build/assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- main script file  -->
    <script src="../../build/assets/js/jquery.min.js" async></script>
    <script src="../build/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
    {{-- <script src="node_modules/flowbite/dist/flowbite.min.js"></script> --}}


</body>

</html>
