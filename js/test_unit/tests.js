QUnit.test("fonction surface()", function (assert){
    assert.equal(surface(100),-1,'ce n\'est pas un objet');
    assert.equal(surface({'forme':'carre','cote':20}),400,'Le carre de 20 et 400');
    assert.equal(surface({'forme':'carre','cote':-10}),-1,'un coté ne peut pas être négatif');
    assert.equal(surface({'forme':'carre'}),-1,'Le coté n\'est pas déclaré ');
    assert.equal(surface({'forme':'car'}),-1,'La forme car n\'existe pas');
    assert.equal(surface({'forme':'rectangle','long':20,'larg':10}),200,'La surface du rectangle est 200');
    assert.equal(surface({'forme':'rectangle','long':20}),-1,'Il manque le parametre larg');
    assert.equal(surface({'forme':'rectangle'}),-1,'Il manque deux paramétres');
    assert.equal(surface({'forme':'rectangle','long':-20,'larg':10}),-1,'Les long ne peuvent pas être négatives');
    assert.equal(surface({'forme':'cercle','rayon':20}),1256,'La surface du cercle est de 200');
});

MiwUnit.test('fonction surface()', function(){ 
    assert(surface(100)==-1,'ce n\'est pas un objet');
    assert(surface({'forme':'carre','cote':20})==400,'Le carre de 20 et 400');
    assert(surface({'forme':'carre','cote':-10})==-1,'un coté ne peut pas être négatif');
    assert(surface({'forme':'carre'})==-1,'Le coté n\'est pas déclaré ');
    assert(surface({'forme':'car'})==-1,'La forme car n\'existe pas');
    assert(surface({'forme':'rectangle','long':20,'larg':10})==200,'La surface du rectangle est 200');
    assert(surface({'forme':'rectangle','long':20})==-1,'Il manque le parametre larg');
    assert(surface({'forme':'rectangle'})==-1,'Il manque deux paramétres');
    assert(surface({'forme':'rectangle','long':-20,'larg':10})==-1,'Les long ne peuvent pas être négatives');
    assert(surface({'forme':'cercle','rayon':20})==1256,'La surface du cercle est de 200');
})

MiwUnit.test('fonction surface()', function(){
    assert(surface(100)==-1,'ce n\'est pas un objet');
    assert(surface({'forme':'carre','cote':20})==400,'Le carre de 20 et 400');
    assert(surface({'forme':'carre','cote':-10})==-1,'un coté ne peut pas être négatif');
    assert(surface({'forme':'carre'})==-1,'Le coté n\'est pas déclaré ');
    assert(surface({'forme':'car'})==-1,'La forme car n\'existe pas');
    assert(surface({'forme':'rectangle','long':20,'larg':10})==200,'La surface du rectangle est 200');
    assert(surface({'forme':'rectangle','long':20})==-1,'Il manque le parametre larg');
    assert(surface({'forme':'rectangle'})==-1,'Il manque deux paramétres');
    assert(surface({'forme':'rectangle','long':-20,'larg':10})==-1,'Les long ne peuvent pas être négatives');
    assert(surface({'forme':'cercle','rayon':20})==1256,'La surface du cercle est de 200');
})