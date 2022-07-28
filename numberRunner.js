function validateNumberRunner() {
	let numberR = document.getElementById("numberRuner").value
	if (numberR < 1) {
		alert("Nieprawidłowy numer zawodnika")
		return false
	} else {
		return true
	}
}
