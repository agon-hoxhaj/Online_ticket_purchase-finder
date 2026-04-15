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
            console.log('Button clicked, ID:', eventId);
            if(eventId) {
                window.location.href = '?id=' + eventId;
            } else {
                console.error('Button has no ID!', this);
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-outline-primary').forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.id;  
            const priceTier = this.value;  
            
            if(eventId && priceTier) {
                window.location.href = '?id=' + eventId + '&price_tier=' + priceTier;
            } else {
                console.error('Button missing id or value!', this);
            }
        });
    });
});