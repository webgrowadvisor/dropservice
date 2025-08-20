<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <!-- Site Title -->
    <title>GST Invoice</title>
    <link rel="stylesheet" href="{{ asset('bill/assets/css/style.css') }}">
</head>

<body>
    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 cs-mb25 column border-bottom-none">
                    <div class="cs-invoice_left w-70 display-flex">
                        <div class="cs-logo cs-mb5 cs-mr20">
                            @if (admininfo()->logo)
                            {!! variantImage(admininfo()->logo, 100, 100) !!}
                            @else
                            <img src="{{ asset('bill/assets/img/logo.svg') }}" alt="Logo">
                            @endif                            
                        </div>
                        <div class="cs-ml22">
                            <div class="cs-invoice_number cs-primary_color cs-mb0 cs-f16">
                                <b class="cs-primary_color">Ivonne Invoice</b>
                            </div>
                            <div class="cs-invoice_number cs-primary_color cs-mb0 cs-f16 display-flex space-between gap-20">
                                <p class="cs-mb0 cs-primary_color cs-mr15"><b>GSTIN:</b></p>
                                <p class="cs-mb0">{{ $orderDetails[0]['seller']->gst ?? 'N/A' }}</p>
                            </div>
                            <div class="cs-invoice_number cs-primary_color cs-mb0 cs-f16  display-flex space-between ">
                                <p class="cs-primary_color cs-mb0"><b>Name:</b></p>
                                <p class="cs-mb0 cs-mr28">{{ $orderDetails[0]['seller']->name ?? '-' }}</p>
                            </div>
                            <div class="cs-invoice_number cs-primary_color cs-mb0 cs-f16  display-flex space-between">
                                <p class="cs-primary_color cs-mb0"><b>Mobile:</b></p>
                                <p class="cs-mb0 cs-mr15">{{ $orderDetails[0]['seller']->mobile ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="cs-invoice_right cs-text_right">
                        <div
                            class="cs-invoice_number cs-primary_color cs-mb0 cs-f16  display-flex justify-content-flex-end">
                            <p class="cs-primary_color"><b>Due Date:</b></p>
                            <p class="cs-mb0">{{ date('Y-m-d') }}</p>
                        </div>
                        <div
                            class="cs-invoice_number cs-primary_color cs-mb0 cs-f16  display-flex justify-content-flex-end">
                            <p class="cs-primary_color cs-mb0"><b>Invoice Date:</b></p>
                            <p class="cs-mb0">{{ \Carbon\Carbon::parse($orderDetails[0]['order']->created_at)->format('d/m/Y') }}</p>
                        </div>
                        <div
                            class="cs-invoice_number cs-primary_color cs-mb0 cs-f16  display-flex justify-content-flex-end">
                            <p class="cs-primary_color cs-mb0"><b>Invoice No:</b></p>
                            <p class="cs-mb0">{{ $orderNumber }}</p>
                        </div>
                    </div>
                </div>
                <div class="display-flex cs-text_center">
                    <div class="cs-border-1"></div>
                    <h5 class="cs-width_12 cs-dip_green_color">TAX INVOICE</h5>
                    <div class="cs-border-1"></div>
                </div>

                <div class="cs-invoice_head cs-mb10 ">
                    <div class="cs-invoice_left cs-mr97">
                        <b class="cs-primary_color">Customer Name:</b>
                        <p class="cs-mb8">{{ $user->name }}</p>
                        <p><b class="cs-primary_color cs-semi_bold">Customer Mobile No.:</b> 
                        <br>{{ $orderDetails[0]['order']->mobile ?? 'N/A' }}</p>
                    </div>
                    <div class="cs-invoice_right">
                        <b class="cs-primary_color">Billing Address:</b>
                        <p>
                            {{ $orderDetails[0]['seller']->address ?? 'N/A' }}
                        </p>
                    </div>
                    <div class="cs-invoice_right">
                        <b class="cs-primary_color">Shipping Address:</b>
                        <p>
                            {{ $orderDetails[0]['order']->address ?? 'N/A' }}
                        </p>
                    </div>
                </div>
                <div class="cs-border"></div>
                <ul class="cs-grid_row cs-col_3 cs-mb0 cs-mt20">
                    <li>
                        <p class="cs-mb20"><b class="cs-primary_color">County Of Supply:</b> <span
                                class="cs-primary_color">India</span></p>
                    </li>
                    <li>
                        <p class="cs-mb20"><b class="cs-primary_color">Place Of Supply:</b> <span
                                class="cs-primary_color">India</span></p>
                    </li>
                    <li>
                        <p class="cs-mb20"><b class="cs-primary_color">Due Date:</b> <span
                                class="cs-primary_color">{{ date('Y-m-d') }}</span></p>
                    </li>
                </ul>

                <div class="cs-border cs-mb30"></div>
                <div class="cs-table cs-style2 cs-f12">
                    <div class="cs-round_border">
                        <div class="cs-table_responsive">
                            <table>
                                <thead>
                                    <tr class="cs-focus_bg">
                                        <th class="cs-width_3 cs-semi_bold cs-primary_color">Item</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color">HSN</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color">Rate</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color">Quantity</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color">Taxable</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color">CGST</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color">SGST</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color cs-text_right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $subtotal = 0; @endphp
                                @foreach($orderDetails as $item)
                                    @php
                                        $rate = $item['order']->price;
                                        $qty = $item['order']->quantity;
                                        $taxable = $rate * $qty;

                                        $cgst_rate = isset($item['product']->cgst) ? $item['product']->cgst / 100 : 0.06;
                                        $sgst_rate = isset($item['product']->sgst) ? $item['product']->sgst / 100 : 0.06;

                                        $cgst = $taxable * $cgst_rate;
                                        $sgst = $taxable * $sgst_rate;
                                        $total = $taxable + $cgst + $sgst;
                                        $subtotal += $total;
                                    @endphp
                                    <tr>
                                        <td>{{ $item['product']->name }}</td>
                                        <td>{{ $item['variant']->sku ?? 'N/A' }}</td>
                                        <td>{{ number_format($rate, 2) }}</td>
                                        <td>{{ $qty }}</td>
                                        <td>{{ number_format($taxable, 2) }}</td>
                                        <td>{{ number_format($cgst, 2) }}</td>
                                        <td>{{ number_format($sgst, 2) }}</td>
                                        <td>{{ number_format($total, 2) }}</td>
                                    </tr>
                                @endforeach                                         
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cs-table cs-style2 cs-mt20">
                    <div class="cs-table_responsive">
                        <table>
                            <tbody>
                                <tr class="cs-table_baseline">
                                    <td class="cs-width_6 cs-primary_color"> Here we can write a additional notes for
                                        the client to get a better understanding of this invoice.

                                    </td>
                                    <td class="cs-width_3 cs-text_right">
                                        <p class="cs-mb5 cs-mb5 cs-f15 cs-primary_color cs-semi_bold">Sub Total:</p>
                                        <!-- <p class="cs-primary_color cs-bold cs-f16 cs-mb5 ">Tax: 0%</p> -->
                                        <p class="cs-border border-none"></p>
                                        <p class="cs-primary_color cs-bold cs-f16 cs-mb5 ">Total:</p>
                                    </td>
                                    <td class="cs-width_3 cs-text_rightcs-f16">
                                        <p class="cs-mb5 cs-mb5 cs-text_right cs-f15 cs-primary_color cs-semi_bold">
                                            {{ priceicon() }}{{ number_format($subtotal, 2) }}
                                        </p>
                                        <!-- <p class="cs-primary_color cs-bold cs-f16 cs-mb5 cs-text_right">$00.00</p> -->
                                        <p class="cs-border"></p>
                                        <p class="cs-primary_color cs-bold cs-f16 cs-mb5 cs-text_right">
                                            {{ priceicon() }}{{ number_format($subtotal, 2) }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="cs-invoice_btns cs-hide_print">
                <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <path
                            d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <circle cx="392" cy="184" r="24" />
                    </svg>
                    <span>Print</span>
                </a>
                <button id="download_btn" class="cs-invoice_btn cs-color2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <title>Download</title>
                        <path
                            d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32" d="M176 272l80 80 80-80M256 48v288" />
                    </svg>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('bill/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bill/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('bill/assets/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('bill/assets/js/main.js') }}"></script>
    
</body>

</html>