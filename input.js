import "flowbite"
import { Modal } from 'flowbite'
import $ from 'jquery'

let searchModal

window.openSearchModal = () => {
  searchModal.show()
}

// TODO: Modal cannot be closed by clicking on the close buttons on Chrome
//       But only on secret mode lulwut

$(() => {
  const $modal = $('#search-modal').first()

  // Don't submit search form if input is empty
  $modal.find('form').on('submit', (ev) => {
    const $form = $(ev.target)
    const data = $form.serializeArray()
    const found = data.find(({ name, value }) => name === 's' && String(value).trim().length > 0)
    
    if (!found) {
      ev.preventDefault()
    }
  })
  
  // Focus on the search input when the search modal is shown.
  const options = {
    onShow: () => {
      $modal.find('input[type=text]').trigger('focus')
    }
  }
  
  searchModal = new Modal($modal[0], options)
})

