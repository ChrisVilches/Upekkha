// TODO: Should I keep jQuery? Find a way to remove it from dependencies? It sucks.
import "flowbite"
import { Modal } from 'flowbite'
import $ from 'jquery'
import { Carousel } from 'flowbite';

function initSearchModal () {
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

  const searchModal = new Modal($modal[0], options)

  $('button[data-open-search-modal]').on('click', () => {
    console.log(searchModal)
    searchModal.show()
  })
}

function initRecommendedCarousel() {
  const element = document.getElementById('recommended-carousel')

  const items = $.map($("[data-carousel-item]"), (el, position) => {
    return { position, el }
  })

  const indicators = $.map($("[data-carousel-indicator]"), (el, position) => {
    return { position, el }
  })

  const options = {
    defaultPosition: 0,
    interval: 3000,
    indicators: {
        items: indicators,
        activeClasses: 'bg-slate-600',
        inactiveClasses: 'bg-slate-200',
    }
  };

  const instanceOptions = {
    id: 'recommended-carousel',
    override: true
  };

  const carousel = new Carousel(element, items, options, instanceOptions);
  carousel.cycle();

  $('[data-carousel-prev]').on('click', carousel.prev.bind(carousel))
  $('[data-carousel-next]').on('click', carousel.next.bind(carousel))
}

$(() => {
  initSearchModal()
  initRecommendedCarousel()
})

