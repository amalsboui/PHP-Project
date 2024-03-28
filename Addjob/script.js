const jobCategories = [
    "Administration",
    "Agriculture",
    "Arts and Design",
    "Automotive",
    "Aviation",
    "Beauty",
    "Biotechnology",
    "Construction",
    "Consulting",
    "Customer Service",
    "Education",
    "Energy",
    "Engineering",
    "Entertainment",
    "Environmental",
    "Fashion",
    "Finance",
    "Fisheries",
    "Fitness",
    "Food Services",
    "Forestry",
    "Gaming",
    "Government",
    "Healthcare",
    "Hospitality",
    "Human Resources",
    "Information Technology",
    "Insurance",
    "Legal",
    "Logistics",
    "Manufacturing",
    "Maritime",
    "Marketing",
    "Media",
    "Mining",
    "Non-profit",
    "Pharmaceutical",
    "Real Estate",
    "Religious",
    "Research",
    "Retail",
    "Sales",
    "Science",
    "Social Services",
    "Space",
    "Sports",
    "Telecommunications",
    "Transportation",
    "Travel",
    "Utilities"  
];


const categorySelect = document.getElementById("category");


jobCategories.forEach(category => {
    const option = document.createElement("option");
    option.text = category;
    option.value = category;
    categorySelect.add(option);
});