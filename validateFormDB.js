function validateForm() {
	var nameDB = document.getElementById("nameDB").value
	var titleEvent = document.getElementById("titleEvent").value
	var cityEvent = document.getElementById("cityEvent").value
	if (nameDB == 0 || titleEvent == 0 || cityEvent == 0) {
		alert("Nie wprowadzono poprawnie wszystkich danych.")
		return false
	} else {
		return true
	}
}
