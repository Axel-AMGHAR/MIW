var t = ["dupont","durand","tata","titi"];

 function a( nom, nb) {
	var i = nb;
	nb += 1;
	while(i >= 0 && t[i] > nom){
		t[i+1] = t[i];
		i++;
    }
	t[i+1] = nom;
}

a("toto",4);
console.log(t);
