const searchInput = document.getElementById('searchInput');
const typeFilter = document.getElementById('typeFilter');
const timeFilter = document.getElementById('timeFilter');
const searchButton = document.getElementById('searchButton');
const itemsContainer = document.getElementById('itemsContainer');

const allItems = Array.from(document.querySelectorAll('.event-item'));

function doSearch() {
    const searchTerm = searchInput.value.toLowerCase().trim();
    const selectedType = typeFilter.value;
    const selectedTime = timeFilter.value;
    
    allItems.forEach(item => {

        const name = item.getAttribute('name');
        const type = item.getAttribute('type');
        const date = item.getAttribute('date');
        
        var matchesSearch = true;
        if (searchTerm !== '') {
            matchesSearch = name.includes(searchTerm);
        }
        
        var SameType = true;
        if (selectedType !== 'all') {
            SameType = type === selectedType;
        }
        
        var SameTime = true;
        if (selectedTime === 'month') {
            SameTime = new Date(date).getMonth() === new Date().getMonth();
        } else if (selectedTime === 'year') {
            SameTime = new Date(date).getFullYear() === new Date().getFullYear();
        } 
        
        if (matchesSearch && SameType && SameTime) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

searchInput.addEventListener('input', doSearch);
searchButton.addEventListener('click', doSearch);
typeFilter.addEventListener('change', doSearch);
timeFilter.addEventListener('change', doSearch);

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-success').forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.id;
            if(eventId) {
                window.location.href = '?id=' + eventId;
            } else {
            }
        });
    });
});

function update(basePrice){

    let finalPrice, label;
    
    if (tier > 0 && tier <= 12) {
        finalPrice = basePrice;
        label = 'Standard 🎟️';
    } else if (tier > 12 && tier <= 16) {
        finalPrice = basePrice * 1.2;
        label = 'Early Bird 🎟️';
    } else {
        finalPrice = basePrice * 2.5;
        label = 'VIP 🎫';
    }
    
    document.getElementById('price_label').textContent = '$' + finalPrice + label;
}
