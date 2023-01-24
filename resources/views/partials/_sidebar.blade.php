@auth
<div x-show="isOpen()" class="sidebar fixed inset-0 flex bg-gray-900 bg-opacity-[90%] h-screen">
    <div @click.away="handleAway()" class="w-80 text-white bg-[#2A3342] shadow">
        <div class="flex bg-[#2A3342] content-between">
            <div class="w-full"></div>
            <a @click.prevent="handleClose()" class="p-3  flex-1 flex items-center" href="#">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
        <ul class="h-full">
            <li>
                <a href="/cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <g fill="none">
                            <path fill="currentColor" d="M18 15H7L5.5 6H21l-3 9z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.5 3m0 0L7 15h11l3-9H5.5z" />
                            <circle cx="8" cy="20" r="1" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <circle cx="17" cy="20" r="1" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </g>
                    </svg>
                    <span>My Cart</span>
                </a>
            </li>
            <li>
                <a href="/wip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 20 20">
                        <g fill="currentColor">
                            <path d="M12.75 12.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm-3.5 0a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                            <path fill-rule="evenodd"
                                d="M10 8a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7Zm0-5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Z"
                                clip-rule="evenodd" />
                            <path d="M10 14a2 2 0 0 1 2 2v1.5a2 2 0 1 1-4 0V16a2 2 0 0 1 2-2Z" />
                            <path fill-rule="evenodd"
                                d="M15 11a5 5 0 0 0-10 0v2.5A2.5 2.5 0 0 0 7.5 16h5a2.5 2.5 0 0 0 2.5-2.5V11Zm-8 0a3 3 0 0 1 6 0v2.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5V11Z"
                                clip-rule="evenodd" />
                            <path
                                d="M15.5 4.5a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2h-2Zm-13 0a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2h-2Z" />
                            <path
                                d="m3.41 4.046l.476-1.455l4.524.863l-.477 1.456l-4.523-.864Zm8.18-.592l.477 1.456l4.523-.864l-.476-1.455l-4.524.863Z" />
                        </g>
                    </svg>
                    <span>Tracking</span>
                </a>
            </li>
            <li>
                <a href="/orders">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path d="M3 3v5h5" />
                            <path d="M3.05 13A9 9 0 1 0 6 5.3L3 8" />
                            <path d="M12 7v5l4 2" />
                        </g>
                    </svg>
                    <span>Order History</span>
                </a>
            </li>
            <li>
                <a href="/wip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 12q.825 0 1.413-.588Q14 10.825 14 10t-.587-1.413Q12.825 8 12 8q-.825 0-1.412.587Q10 9.175 10 10q0 .825.588 1.412Q11.175 12 12 12Zm0 10q-4.025-3.425-6.012-6.363Q4 12.7 4 10.2q0-3.75 2.413-5.975Q8.825 2 12 2t5.587 2.225Q20 6.45 20 10.2q0 2.5-1.987 5.437Q16.025 18.575 12 22Z" />
                    </svg>
                    <span>Delivery Address</span>
                </a>
            </li>
        </ul>
    </div>
</div>
@endauth