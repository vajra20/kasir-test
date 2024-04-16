@extends('layout.sidebar.sidebar')
@section('title', 'Product')

@section('content-web')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    Product
                </h2>

                <nav class="self-end">
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="{{ route('user') }}">Dashboard /</a>
                        </li>
                        <li class="font-medium text-primary">Product</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Table Section Start -->
            <div
                class="rounded-sm border border-stroke bg-box px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                <div class="max-w-full overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                <th class="w-fit px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                    NO
                                </th>
                                <th class="min-w-[200px] px-4 py-4 font-medium text-black dark:text-white">
                                    Product Name
                                </th>
                                <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                    Price
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Stock
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                        <span>{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                        <h5 class="font-medium text-black dark:text-white">{{ $product->name }}</h5>
                                    </td>
                                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                        <p class="text-black dark:text-white">
                                            Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                    </td>
                                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                        <p class="text-black dark:text-white">{{ $product->stock }}</p>
                                    </td>
                                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                        <div class="flex items-center space-x-3.5">
                                            <button class="hover:text-primary"
                                                data-modal-target="view-modal-{{ $product->id }}"
                                                data-modal-toggle="view-modal-{{ $product->id }}">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                        fill="" />
                                                    <path
                                                        d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                        fill="" />
                                                </svg>
                                            </button>

                                            <!-- View modal -->
                                            <div id="view-modal-{{ $product->id }}" tabindex="-1" aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-gray-700 rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Detail Modal Product
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="view-modal-{{ $product->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5 space-y-4">
                                                            <div class="grid grid-cols-3">
                                                                <div class="flex flex-col gap-y-2 col-span-1">
                                                                    <span>Name Product</span>
                                                                    <span>Price Product</span>
                                                                    <span>Stock Product</span>
                                                                    <span>Image Product</span>
                                                                </div>
                                                                <div class="flex flex-col gap-y-2 col-span-2">
                                                                    <span>: {{ $product->name }}</span>
                                                                    <span>: {{ $product->price }}</span>
                                                                    <span>: {{ $product->stock }}</span>
                                                                    <img src="{{ asset('image/' . $product->image) }} "
                                                                        alt="image" class="w-40 h-40 object-cover"></img>
                                                                </div>
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div
                                                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                <button data-modal-hide="default-modal" type="button"
                                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                                    accept</button>
                                                                <button data-modal-hide="default-modal" type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ====== Table Section End -->
        </div>
    </main>
@endsection
