    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="h-56 w-full">
          <a href={{'/carte/'.$isbn}}>
            <img class="mx-auto h-full dark:hidden" src={{Storage::url($cover)??"https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"}} alt="" />
            <img class="mx-auto hidden h-full dark:block" src={{Storage::url($dark_cover)??"https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"}} alt="" />
          </a>
        </div>
        <div class="pt-6">
          <div class="mb-4 flex items-center justify-between gap-4">
            <span class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">  </span>

            <div class="flex items-center justify-end gap-1">
              <button message='added to favorite' url={{route('favorite.add',['isbn'=>$isbn,'_token'=>csrf_token()])}} type="button" data-tooltip-target="tooltip-add-to-favorites" class="smart_button rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only"> {{__('Favorite')}} </span>
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                </svg>
              </button>
              <div  id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                {{__('Favorite')}}
                <div class="tooltip-arrow" data-popper-arrow=""></div>
              </div>
            </div>
          </div>

          <a href={{'/carte/'.$isbn}} class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{$titlu}}</a>

          <div class="mt-2 flex items-center gap-2">
            <div class="flex items-center">
            @for ($i = 0; $i < $stele; $i++)
                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>
            @endfor

            @for ($i = $stele; $i < 5 ; $i++)
              <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
              </svg>
            @endfor

            </div>

          </div>


          <div class="mt-4 flex items-center justify-between gap-4">
            <p class="font-extrabold leading-tight text-gray-900 dark:text-white">{{$numar_pagini}}</p>

            <button message='added to list' url={{route('cart.add',['isbn'=>$isbn,'_token'=>csrf_token()])}} type="button" class="smart_button inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
              </svg>
              {{__('Add to list')}}
            </button>
          </div>
        </div>
      </div>
