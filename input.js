// TODO: Should I keep jQuery? Find a way to remove it from dependencies? It sucks.
import "flowbite"
import { Modal } from 'flowbite'
import { Carousel } from 'flowbite';

function initSearchModal () {
  const modalElement = document.querySelector('#search-modal')

  // Don't submit search form if input is empty
  modalElement.querySelector('form').addEventListener('submit', (ev) => {
    const formElement = ev.target
    const formData = new FormData(formElement)
    if ((formData.get('s') ?? '').trim().length === 0) {
      ev.preventDefault()
    }
  })
  
  // Focus on the search input when the search modal is shown.
  const options = {
    onShow: () => {
      modalElement.querySelector('input[type=text]').focus()
    }
  }

  const searchModal = new Modal(modalElement, options)

  for(const element of document.querySelectorAll('button[data-open-search-modal]')) {
    element.addEventListener('click', () => {
      searchModal.show()
    })
  }

}

function initRecommendedCarousel() {
  const element = document.getElementById('recommended-carousel')
  if (!element) return

  const items = Array.from(document.querySelectorAll("[data-carousel-item]")).map((el, position) => {
    return { position, el }
  })

  const indicators = Array.from(document.querySelectorAll("[data-carousel-indicator]")).map((el, position) => {
    return { position, el }
  })

  const options = {
    defaultPosition: 0,
    interval: 3000,
    indicators: {
        items: indicators,
        // NOTE: Indicator style can be set here.
        // activeClasses: 'bg-slate-600',
        // inactiveClasses: 'bg-slate-200',
    }
  };

  const instanceOptions = {
    id: 'recommended-carousel',
    override: true
  };

  const carousel = new Carousel(element, items, options, instanceOptions);
  carousel.cycle();

  document.querySelector('[data-carousel-prev]').addEventListener('click', carousel.prev.bind(carousel))
  document.querySelector('[data-carousel-next]').addEventListener('click', carousel.next.bind(carousel))
}

document.addEventListener("DOMContentLoaded", () => { 
  initSearchModal()
  initRecommendedCarousel()
})

