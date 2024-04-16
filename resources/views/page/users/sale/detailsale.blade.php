@extends('layout.sidebar.sidebar')
@section('title', 'Payment')

@section('content-web')
    @if (session()->has('order-error-message'))
        <div class="fixed bottom-0 right-8 z-99999 mb-3">

            <div id="toast-danger"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session()->get('order-error-message') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if (session()->has('stock-error-message'))
        <div class="fixed bottom-0 right-8 z-99999 mb-3">
            <div id="toast-danger"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session()->get('stock-error-message') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if (session()->has('error-message'))
        <div class="fixed bottom-0 right-8 z-99999 mb-3">
            <div id="toast-danger"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session()->get('error-message') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif


    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

        <form action="{{ route('detailsale.store') }}" method="POST">
            @csrf
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    Detail Sale
                </h2>

                <nav class="self-end">
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="{{ route('user') }}">Dashboard /</a>
                        </li>
                        <li class="font-medium">
                            <a class="font-medium" href="{{ route('user.payment') }}">Payment /</a>

                        </li>
                        <li class="font-medium text-primary">Detail Sale</li>
                    </ol>
                </nav>

                <button type="submit"
                    class="p-2 bg-green-500 rounded-lg font-semibold hover:shadow-green-900 hover:shadow-md transition-all duration-300">
                    <div class="flex flex-row gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bodydark1" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor"
                                d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                        </svg>
                        <span class="text-bodydark1">Add Payment</span>
                    </div>
                </button>
            </div>
            <!-- Breadcrumb End -->

            <div class="grid grid-cols-3 gap-5">
                @foreach ($products as $product)
                    <div
                        class="w-full h-min max-w-sm bg-bodydark1 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <img class="rounded-xl object-cover w-full h-full p-5 max-h-80"
                            src="{{ asset('image/' . $product->image) }}" alt="product image" />
                        <div class="px-5 pb-5">
                            <div class="flex flex-row w-full justify-between">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}</h5>
                                <span class="text-box font-medium">Stock : {{ $product->stock }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-2xl font-bold text-gray-900 dark:text-white">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="px-5">
                            {{-- <input type="hidden" name="products_id[{{ $product->id }}]" value="{{ $product->id }}"> --}}
                            <div class="flex flex-row items-center px-5 w-full justify-center ">
                                <button type="button" class="text-black-2 text-xl"
                                    id="button-min{{ $product->id }}">-</button>
                                <input type="number" value="0" id="totalProduct{{ $product->id }}"
                                    name="total_product[{{ $product->id }}]"
                                    class="text-xl bg-transparent focus:outline-none border-none w-fit text-center text-black-2 focus:ring-0">
                                <button type="button" class="text-black-2 text-xl"
                                    id="button-plus{{ $product->id }}">+</button>
                            </div>
                            <div class="flex flex-row gap-0 items-center">
                                <span class="text-black-2 w-min text-nowrap">Subtotal : Rp</span>
                                <input type="number" id="subtotal{{ $product->id }}"
                                    class="w-full bg-transparent focus:outline-none border-none text-start text-black-2"
                                    value="0" disabled>
                            </div>
                        </div>
                    </div>

                    <script>
                        var buttonPlus = document.getElementById('button-plus{{ $product->id }}')
                        var buttonMin = document.getElementById('button-min{{ $product->id }}')
                        var totalProduct = document.getElementById('totalProduct{{ $product->id }}')
                        var subtotal = document.getElementById('subtotal{{ $product->id }}')

                        buttonPlus.addEventListener('click', function() {
                            var value = parseInt(totalProduct{{ $product->id }}.value);
                            if (!isNaN(value))
                                totalProduct{{ $product->id }}.value = value + 1;
                            CalcSubtotal{{ $product->id }}()
                        })

                        buttonMin.addEventListener('click', function() {
                            var value = parseInt(totalProduct{{ $product->id }}.value)
                            if (value > 0) {
                                totalProduct{{ $product->id }}.value = value - 1;
                            }
                            CalcSubtotal{{ $product->id }}()
                        })

                        function CalcSubtotal{{ $product->id }}() {
                            var price = {{ $product->price }}
                            var product = parseInt(totalProduct{{ $product->id }}.value)
                            var total = price * product;

                            subtotal{{ $product->id }}.value = number_format(total, 0, ',', '.')
                        }

                        function number_format(number, decimals, dec_point, thousands_sep) {
                            // Strip all characters but numerical ones.
                            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                            var n = !isFinite(+number) ? 0 : +number,
                                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                                s = '',
                                toFixedFix = function(n, prec) {
                                    var k = Math.pow(10, prec);
                                    return '' + Math.round(n * k) / k;
                                };
                            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                            if (s[0].length > 3) {
                                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                            }
                            if ((s[1] || '').length < prec) {
                                s[1] = s[1] || '';
                                s[1] += new Array(prec - s[1].length + 1).join('0');
                            }
                            return s.join(dec);
                        }
                    </script>
                @endforeach

            </div>
        </form>
    </div>
@endsection
