// Example contract data (you can replace this with dynamic data from your backend)
const contracts = [
    {
        category: 'Crop Farming',
        title: 'Wheat Supply Contract',
        description: 'Looking to supply 100 tons of high-quality wheat for the upcoming season.',
        itemQuantity: '100',
        quantityType: 'Tons',
        expectedPrice: '50,000',
        priceType: 'Per Ton',
        availableDate: '2024-10-01',
        mobile: '1234567890',
        address: '123 Farm Lane',
        state: 'Gujarat',
        district: 'Ahmedabad',
        subDistrict: 'Daskroi',
        village: 'Vasna'
    },
    {
        category: 'Livestock Farming',
        title: 'Goat Supply Contract',
        description: 'Offering 50 goats for sale, suitable for meat and milk production.',
        itemQuantity: '50',
        quantityType: 'Animals',
        expectedPrice: '7,000',
        priceType: 'Per Goat',
        availableDate: '2024-09-15',
        mobile: '9876543210',
        address: '456 Ranch Road',
        state: 'Maharashtra',
        district: 'Pune',
        subDistrict: 'Shirur',
        village: 'Nighoje'
    }
];

// Function to dynamically display contracts
function displayContracts() {
    const contractList = document.getElementById('contractList');
    contractList.innerHTML = '';

    contracts.forEach(contract => {
        const contractCard = `
            <div class="contract-card">
                <h3>${contract.title}</h3>
                <p><strong>Category:</strong> ${contract.category}</p>
                <p><strong>Description:</strong> ${contract.description}</p>
                <p><strong>Item Quantity:</strong> ${contract.itemQuantity} ${contract.quantityType}</p>
                <p><strong>Expected Price:</strong> ₹${contract.expectedPrice} ${contract.priceType}</p>
                <p><strong>Available Date:</strong> ${contract.availableDate}</p>
                <p><strong>Mobile No:</strong> ${contract.mobile}</p>
                <p><strong>Address:</strong> ${contract.village}, ${contract.subDistrict}, ${contract.district}, ${contract.state}</p>
                <div class="contract-meta">
                    <p><strong>State:</strong> ${contract.state}</p>
                    <p><strong>District:</strong> ${contract.district}</p>
                    <p><strong>Sub District:</strong> ${contract.subDistrict}</p>
                    <p><strong>Village:</strong> ${contract.village}</p>
                </div>
        <button class="btn">Buy Now</button>
            </div>
        `;
        contractList.innerHTML += contractCard;
    });
}

// Run the function when the page loads
window.onload = displayContracts;
