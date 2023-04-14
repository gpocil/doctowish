function isEmail(mail) {
	let pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return pattern.test(mail);
}

function isPostal(cp){
    let pattern = /^[0-9]{5}$/;
    return pattern.test(cp);
}
        
function isTel(tel){
    let pattern = /^[0-9]{10}$/;
    return pattern.test(tel);
}

function isAdeli(adeli){
    let pattern = /^[0-9]{9}$/;
    return pattern.test(adeli);
}