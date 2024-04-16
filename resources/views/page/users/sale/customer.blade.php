@extends('layout.sidebar.sidebar')
@section('title', 'Form Customer')
@section('content-web')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Customer Form
            </h2>

            <nav class="self-end">
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{ route('user') }}">Dashboard /</a>
                    </li>
                    <li class="font-medium">
                        <a class="font-medium" href="{{ route('user.payment') }}">Payment /</a>

                    </li>
                    <li class="font-medium ">
                        <a class="font-medium" href="{{ route('user.payment') }}">Detail Sale /</a>
                    </li>
                    <li class="font-medium text-primary">Customer Form</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <div class="grid grid-cols-3 gap-10">
            <div class="p-4 bg-bodydark2 rounded col-span-1 h-fit">
                <div class="text-center w-full border-b-2 border-solid border-black-2 pb-2">
                    <span class="text-xl font-bold text-black-2 text-center ">Transaction Receipt</span>
                </div>
                <div class="p-2 flex flex-col gap-y-2.5">
                    @foreach ($detailsale as $detail)
                        <div class="flex flex-row w-full justify-between gap-5 items-center">
                            <div class="flex flex-col text-base text-black-2">
                                <span class="font-medium">{{ $detail->product->name }}</span>
                                <span class="text-sm">Rp{{ number_format($detail->product->price, 0, ',', '.') }} X
                                    {{ $detail->total_product }}</span>
                            </div>
                            <span
                                class="text-black-2 text-xl font-semibold">{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <span class="mt-5 text-lg font-bold text-black-2 text-start w-full">Total Price :
                        Rp{{ number_format($sale->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="flex flex-col gap-9 col-span-2">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-box shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Customer Form
                        </h3>
                    </div>
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                        Name
                                    </label>
                                    <input type="text" placeholder="Enter your first name" name="name"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                        Address
                                    </label>
                                    <input type="text" placeholder="Enter your last name" name="address"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                </div>
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    No. Telephone
                                </label>
                                <input type="number" placeholder="Select subject" name="telp"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <button type="submit"
                                class="flex w-full justify-center rounded !bg-[#3C50E0] p-3 font-medium text-gray hover:bg-opacity-90">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
