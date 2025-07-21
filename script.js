// Page Navigation
function showPage(pageId) {
  // Hide all pages
  const pages = document.querySelectorAll(".page")
  pages.forEach((page) => page.classList.add("hidden"))

  // Show target page
  const targetPage = document.getElementById(pageId + "-page")
  if (targetPage) {
    targetPage.classList.remove("hidden")
    // Close sidebar if open on mobile when navigating
    const openSidebar = document.querySelector(".sidebar.open")
    if (openSidebar) {
      openSidebar.classList.remove("open")
      document.body.classList.remove("no-scroll") // Re-enable scroll
    }
  }
}

// Sidebar Toggle (for mobile)
function toggleSidebar(sidebarSelector) {
  const sidebar = document.querySelector(sidebarSelector)
  if (sidebar) {
    sidebar.classList.toggle("open")
    document.body.classList.toggle("no-scroll") // Prevent scrolling when sidebar is open
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.getElementById("login-form")
  const registerForm = document.getElementById("register-form")
  const addProductForm = document.getElementById("add-product-form")
  const editProductForm = document.getElementById("edit-product-form")

  // Setup sidebar toggles for all dashboard pages
  toggleSidebar("#admin-dashboard-page .sidebar") // Initial setup for admin dashboard
  toggleSidebar("#admin-requests-page .sidebar")
  toggleSidebar("#admin-roles-page .sidebar")
  toggleSidebar("#admin-orders-page .sidebar")
  toggleSidebar("#entrepreneur-dashboard-page .sidebar")
  toggleSidebar("#entrepreneur-products-page .sidebar")
  toggleSidebar("#entrepreneur-product-add-page .sidebar")
  toggleSidebar("#entrepreneur-product-edit-page .sidebar")
  toggleSidebar("#entrepreneur-orders-page .sidebar")

  // Setup sidebar toggles for public pages
  document
    .getElementById("sidebar-toggle-stands")
    ?.addEventListener("click", () => toggleSidebar("#stands-page .sidebar"))
  document
    .getElementById("sidebar-toggle-products-public")
    ?.addEventListener("click", () => toggleSidebar("#stand-products-page .sidebar"))
  document.getElementById("sidebar-toggle-cart")?.addEventListener("click", () => toggleSidebar("#cart-page .sidebar"))
  document
    .getElementById("sidebar-toggle-search")
    ?.addEventListener("click", () => toggleSidebar("#search-page .sidebar"))

  if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault()

      const email = document.getElementById("email").value
      const password = document.getElementById("password").value
      const errorElement = document.getElementById("login-error")

      // Simple demo authentication
      if (email === "admin@eatdrink.com" && password === "admin123") {
        // Success - go to admin dashboard
        showPage("admin-dashboard")
        errorElement.classList.add("hidden")
      } else if (email === "entrepreneur@eatdrink.com" && password === "entrepreneur123") {
        // Success - go to entrepreneur dashboard
        showPage("entrepreneur-dashboard")
        errorElement.classList.add("hidden")
      } else if (email && password) {
        // Simulate different user states
        const random = Math.random()
        if (random < 0.3) {
          // Show error message
          errorElement.classList.remove("hidden")
        } else if (random < 0.6) {
          // Pending approval
          showPage("pending")
        } else {
          // Not approved
          showPage("error")
        }
      } else {
        errorElement.classList.remove("hidden")
      }
    })
  }

  if (registerForm) {
    registerForm.addEventListener("submit", (e) => {
      e.preventDefault()

      const firstName = document.getElementById("firstName").value
      const lastName = document.getElementById("lastName").value
      const email = document.getElementById("regEmail").value
      const company = document.getElementById("company").value
      const password = document.getElementById("regPassword").value
      const confirmPassword = document.getElementById("confirmPassword").value

      // Simple validation
      if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas")
        return
      }

      if (firstName && lastName && email && company && password) {
        // Registration successful - go to pending page
        showPage("pending")
      } else {
        alert("Veuillez remplir tous les champs")
      }
    })
  }

  if (addProductForm) {
    addProductForm.addEventListener("submit", (e) => {
      e.preventDefault()
      alert("Produit ajouté (simulation) !")
      showPage("entrepreneur-products") // Go back to product list
    })
  }

  if (editProductForm) {
    editProductForm.addEventListener("submit", (e) => {
      e.preventDefault()
      alert("Produit modifié (simulation) !")
      showPage("entrepreneur-products") // Go back to product list
    })
  }

  // Search functionality (dummy)
  const searchInput = document.getElementById("search-input")
  const searchSuggestions = document.getElementById("search-suggestions")
  const searchResults = document.getElementById("search-results")
  const searchResultsGrid = searchResults ? searchResults.querySelector(".product-grid") : null
  const noResultsMessage = searchResults ? searchResults.querySelector("#no-search-results") : null

  if (searchInput) {
    searchInput.addEventListener("input", function () {
      const query = this.value.toLowerCase()
      if (query.length > 2) {
        searchSuggestions.classList.remove("hidden")
        searchResults.classList.remove("hidden")
        // Simulate search results
        if (query.includes("tarte") || query.includes("gourmet")) {
          if (searchResultsGrid)
            searchResultsGrid.innerHTML = `
                        <div class="glass-card product-card-public">
                            <img src="/placeholder.svg?height=100&width=100" alt="Tarte aux Truffes" class="product-image">
                            <div class="product-info">
                                <h4>Tarte aux Truffes</h4>
                                <p class="product-description">Délicieuse tarte aux truffes noires fraîches.</p>
                                <p class="product-price">25.00€</p>
                            </div>
                            <button class="btn btn-primary btn-sm" onclick="addToCart('Tarte aux Truffes', 25.00)">Ajouter au panier</button>
                        </div>
                    `
          if (noResultsMessage) noResultsMessage.classList.add("hidden")
        } else if (query.includes("cocktail")) {
          if (searchResultsGrid)
            searchResultsGrid.innerHTML = `
                        <div class="glass-card product-card-public">
                            <img src="/placeholder.svg?height=100&width=100" alt="Cocktail Exotique" class="product-image">
                            <div class="product-info">
                                <h4>Cocktail Exotique</h4>
                                <p class="product-description">Boisson rafraîchissante aux fruits tropicaux.</p>
                                <p class="product-price">12.00€</p>
                            </div>
                            <button class="btn btn-primary btn-sm" onclick="addToCart('Cocktail Exotique', 12.00)">Ajouter au panier</button>
                        </div>
                    `
          if (noResultsMessage) noResultsMessage.classList.add("hidden")
        } else {
          if (searchResultsGrid) searchResultsGrid.innerHTML = ""
          if (noResultsMessage) noResultsMessage.classList.remove("hidden")
        }
      } else {
        searchSuggestions.classList.add("hidden")
        searchResults.classList.add("hidden")
      }
    })
  }
})

// Cart functionality (dummy)
let cart = []

function addToCart(productName, price) {
  const existingItem = cart.find((item) => item.name === productName)
  if (existingItem) {
    existingItem.quantity++
  } else {
    cart.push({ name: productName, price: price, quantity: 1 })
  }
  updateCartDisplay()
  alert(`${productName} ajouté au panier !`)
}

function updateCartDisplay() {
  const cartItemsContainer = document.getElementById("cart-items")
  const cartTotalPriceElement = document.getElementById("cart-total-price")
  const cartItemCountElement = document.getElementById("cart-item-count")
  const emptyCartMessage = document.getElementById("empty-cart-message")

  if (!cartItemsContainer || !cartTotalPriceElement || !cartItemCountElement || !emptyCartMessage) return

  cartItemsContainer.innerHTML = ""
  let total = 0
  let itemCount = 0

  if (cart.length === 0) {
    emptyCartMessage.classList.remove("hidden")
  } else {
    emptyCartMessage.classList.add("hidden")
    cart.forEach((item) => {
      const itemElement = document.createElement("div")
      itemElement.classList.add("cart-item")
      itemElement.innerHTML = `
                <img src="/placeholder.svg?height=60&width=60" alt="${item.name}" class="cart-item-image">
                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <p>${item.price.toFixed(2)}€ / unité</p>
                </div>
                <div class="cart-item-quantity">
                    <button class="quantity-btn" onclick="changeQuantity('${item.name}', -1)">-</button>
                    <span>${item.quantity}</span>
                    <button class="quantity-btn" onclick="changeQuantity('${item.name}', 1)">+</button>
                </div>
                <span class="cart-item-price">${(item.price * item.quantity).toFixed(2)}€</span>
            `
      cartItemsContainer.appendChild(itemElement)
      total += item.price * item.quantity
      itemCount += item.quantity
    })
  }

  cartTotalPriceElement.textContent = `${total.toFixed(2)}€`
  cartItemCountElement.textContent = itemCount
}

function changeQuantity(productName, delta) {
  const item = cart.find((i) => i.name === productName)
  if (item) {
    item.quantity += delta
    if (item.quantity <= 0) {
      cart = cart.filter((i) => i.name !== productName)
    }
  }
  updateCartDisplay()
}

// Initial cart display on page load
document.addEventListener("DOMContentLoaded", updateCartDisplay)

// Add some interactive effects
document.addEventListener("DOMContentLoaded", () => {
  // Add hover effects to cards
  const cards = document.querySelectorAll(".glass-card")
  cards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-5px)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
    })
  })

  // Add click ripple effect to buttons
  const buttons = document.querySelectorAll(".btn")
  buttons.forEach((button) => {
    button.addEventListener("click", function (e) {
      const ripple = document.createElement("span")
      const rect = this.getBoundingClientRect()
      const size = Math.max(rect.width, rect.height)
      const x = e.clientX - rect.left - size / 2
      const y = e.clientY - rect.top - size / 2

      ripple.style.width = ripple.style.height = size + "px"
      ripple.style.left = x + "px"
      ripple.style.top = y + "px"
      ripple.classList.add("ripple")

      this.appendChild(ripple)

      setTimeout(() => {
        ripple.remove()
      }, 600)
    })
  })
})

// Add ripple effect CSS
const style = document.createElement("style")
style.textContent = `
    .btn {
        position: relative;
        overflow: hidden;
    }
    
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    }
    
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    /* Prevent body scroll when sidebar is open on mobile */
    body.no-scroll {
        overflow: hidden;
    }
`
document.head.appendChild(style)
