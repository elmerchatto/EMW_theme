/**
 * Options
 * 
 * @target : html element to animate  --REQUIRED--
 * @trigger : element to start animate --REQUIRED--
 * @animationType : parallax, staggerRight, staggerLeft
 * @triggerHook : default 0.8
 * @offset : default 0
 * @reverse : boolean default true
 * @duration : default trigger element height, to set use 1% to 100%
 * 
 * @move : If you put move options, fill all options
 * 
 * @position : from, to, fromTo
 * @y : Supports only 'parallax' default value: 200
 * @x : Supports only 'staggerRight & staggerLeft' default value: '30%'
 * 
 * 
 * 
 * Options Example below
 * emw_scrollmagic({
 *       target: 'li',
 *       trigger: '.example-class-trigger',
 *       duration: '100%',
 *       animationType: 'staggerRight', 
 *      move:{
 *           position:'from', 
 *           y: 500,
 *           x:'+20%',         // Works only in Stagger
 *           autoAlpha: 1,
 *           opacity: 1,
 *           y2: 500,        // Works only in fromTo for Parallax
 *           autoAlpha2: 0,  // Works only in fromTo for Parallax
 *           opacity2: 0     // Works only in fromTo for Parallax
 *           
 *        }
 *   });
 * 
 */


var controller = new ScrollMagic.Controller();

function emw_scrollmagic($args) {

    let elTarget = $args.target != null ? $args.target : false;
    let trigger = $args.trigger != null ? $args.trigger : false;
    let animationType =  $args.animationType != null ? $args.animationType : 'parallax';
    let triggerHook = $args.triggerHook != null ? $args.triggerHook : 0.8;
    let offset = $args.offset != null ? $args.offset : 0;
    let reverse = $args.reverse != null ? $args.reverse : true;
    let duration = $args.duration != null ? $args.duration : $(trigger).outerHeight();
    let move = $args.move != null ? $args.move.position : 'from';
    let autoAlpha = $args.move != null ? $args.move.autoAlpha : 0;
    let autoAlpha2 = $args.move != null ? $args.move.autoAlpha2 : 1;
    let opacity = $args.move != null ? $args.move.opacity : 0;
    let opacity2 = $args.move != null ? $args.move.opacity2 : 1;

    var x = $args.move != null ? $args.move.x : '30%';
    var y = $args.move != null ? $args.move.y : 200;
    var y2 = $args.move != null ? $args.move.y2 : 200;


    if(elTarget == false || trigger == false) {

        console.log('Insert Target and Trigger Elements');

        return;
    }

    $(trigger).each(function(){

        let $this = $(this);
        let target = $(this).find(elTarget);
        let timeline = new TimelineMax();
        var animation;

        switch(animationType) {

            case 'parallax' :

                if(move=='fromTo') {

                    animation = TweenMax.fromTo(target, 2, {
                        y: y, autoAlpha:autoAlpha, opacity: opacity
                    }, {
                        y: y2, autoAlpha:autoAlpha2, opacity:  opacity2
                    });

                } else {
                    
                    animation = move == 'from' ? TweenMax.from(target, 2, {y: y, autoAlpha:autoAlpha, opacity: opacity }) : TweenMax.to(target, 2, {y: -y, autoAlpha:autoAlpha, opacity: opacity});
                }
                
                break;


            case 'staggerRight' :
                
                animation =  move == 'from' ? TweenMax.from(target, .9, {x: x, autoAlpha: autoAlpha, ease: Power0.easeNone, stagger: 0.3},"-=0.6") : TweenMax.to(target, .9, {x: x, autoAlpha: 1, ease: Power0.easeNone, stagger: 0.3},"-=0.6");

                break;
                
            case 'staggerLeft' :

                animation =  move == 'to' ? TweenMax.from(target, .9, {x: x, autoAlpha: autoAlpha, ease: Power0.easeNone, stagger: 0.3},"-=0.6") : TweenMax.to(target, .9, {x: x, autoAlpha: 1, ease: Power0.easeNone, stagger: 0.3},"-=0.6");

                break;    
        }    

        timeline.add(animation);

        new ScrollMagic.Scene({
                triggerElement: this,
                triggerHook: triggerHook,
                offset: offset,
                reverse: reverse,    
                duration: duration
                
            })
            .setTween(timeline)
            .addTo(controller);  

    });

}


