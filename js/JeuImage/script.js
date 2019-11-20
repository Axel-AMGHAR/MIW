onload = function () {
    
    class JeuImage {
    
        constructor (image){
            this.image = image;
            this.directionx = 'avant';
            this.directiony = 'avant';
            this.max_height = windowHeight();
            this.max_width =  windowWidth();
        }

        affiche = (x,y) =>{
            let body = _('body');
            this.x = parseFloat(x);
            this.y = parseFloat(y);
            this.img = _ce('img',body);
            this.img.attrib({
                style: `position: absolute; top: ${this.x}px; left: ${this.y}px;`,
                src: this.image 
            });
            
            this.img.onclick = () => {
                this.efface();
            };
            
        }

        rand(min,max) {
            return Math.floor(Math.random() * (max+1 - min) + min);
        }
    
        change_color(){
            this.img.style.backgroundColor = 'rgb('+this.rand(0,255)+','+this.rand(0,255)+','+this.rand(0,255)+')';
        }
    
        deplace(){
            let that = this;
                (this.directionx == 'avant')?this.x ++:this.x--;
                (this.directiony == 'avant')?this.y++:this.y--;
                
                if(this.x+160 >= this.max_height){
                    this.directionx = 'arrière';
                    this.change_color();
                }
                if(this.y+290 >= this.max_width){
                    this.directiony = 'arrière';
                    this.change_color();
                }
                
                if(this.x <= 0){
                    this.directionx = 'avant';
                    this.change_color();
                }
                if(this.y <= 0){
                    this.directiony = 'avant';
                    this.change_color();
                }
            
                this.img.style.position = 'absolute';
                this.img.style.top = this.x+'px';
                this.img.style.left = this.y+'px';
/*                this.img.attrib({
                    style: `position: absolute; top: ${this.x}px; left: ${this.y}px;`, 
                });*/
/*           window.setTimeout(function(){that.deplace();}, 1);*/

        }

        efface(){

        }
    }

    let o_jeu_image1 = new JeuImage('img/dvd.png');
/*
    let o_jeu_image2 = new JeuImage('img/7388.jpg');
*/
    
    o_jeu_image1.affiche('30','70');
/*
    o_jeu_image2.affiche('70','30');
*/
    
window.setInterval(function () {o_jeu_image1.deplace();}, 1);
    
}