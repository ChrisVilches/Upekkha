<div id="<?= $args['modal-id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <!-- TODO: The font glitches a bit, even with all the loading I implemented -->
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          <i class="fa-brands fa-line text-green-500 pr-4"></i>Add me on Line!
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="<?= $args['modal-id'] ?>">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <div class="flex justify-center items-center my-10">
        <img src="" data-role="line-qr" data-qr-content="line://ti/p/~<?= $args['line-id'] ?>">
      </div>
      <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button data-modal-hide="<?= $args['modal-id'] ?>" type="button" class="secondary-btn">Close</button>
      </div>
    </div>
  </div>
</div>
