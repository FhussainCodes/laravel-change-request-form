function getUsersByModule(moduleName) {
    const assignedByDropdown = document.getElementById('assigned_to');
    
    assignedByDropdown.innerHTML = '<option value="">Select Assigned Person</option>';
    if (!moduleName) return; 

    fetch(`/get-users-by-module?module=${encodeURIComponent(moduleName)}`)
        .then(response => response.json())
        .then(users => {
            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.name; 
                option.textContent = user.name;
                assignedByDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching users:', error);
        });
}
