let estadoo = ["Yaracuy", "Lara", "Caracas", "Miranda", "Amazonas", "Anzoategui", "Apure", "Aragua", "Barinas", "Bolivar",
"Carabobo", "Cojedes", "Delta Amacuro", "Distrito Federal", "Falcon", "Guarico", "Merida", "Miranda", "Monagas", "Nueva Esparta",
"Portuguesa", "Sucre","Tachira", "Trujillo", "Vargas", "Zulia"];

let municipios = ["San Felipe", "Cocorote", "Trinidad","Nirgua","Bruzual","Independencia","Sucre","Manuel Monje",
"Aristides Batidas", "Peña", "Veroes", "Bolivar","Uraciche", "Paez", "Barquisimeto", "Iribarren", "Chacao", "Baruta", "Sucre", "Libertador"];

let estado=document.getElementById('estado');
let municipio=document.getElementById('municipio');

function recorrer(combobox,valores){
	municipio.innerHTML=''

	for (let index of valores){
		combobox.innerHTML+=`
		<option>${index}</option>
		`
	}
		
	
}

function llenarestado() {
	recorrer(estado,estadoo)
}
 llenarestado()

 estado.addEventListener('change', (e)=>{
	let datos=e.target.value
	switch (datos) {
		case 'Yaracuy':
			recorrer(municipio, municipios.slice(0,14))
			break;
			case 'Lara':
			recorrer(municipio, municipios.slice(14,16))
			break;
			case 'Caracas':
			recorrer(municipio, municipios.slice(16,21))
	
		default:
			break;
	}
 })