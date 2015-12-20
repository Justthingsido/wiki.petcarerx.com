
<script>

    function Particle( x, y, radius ) {
    this.init( x, y, radius );
}

Particle.prototype = {

    init: function( x, y, radius ) {

        this.alive = true;

        this.radius = radius || 10;
        this.wander = 0.15;
        this.theta = random( TWO_PI );
        this.drag = 0.92;
        this.color = '#fff';

        this.x = x || 0.0;
        this.y = y || 0.0;

        this.vx = 0.0;
        this.vy = 0.0;
    },

    move: function() {

        this.x += this.vx;
        this.y += this.vy;

        this.vx *= this.drag;
        this.vy *= this.drag;

        this.theta += random( -0.5, 0.5 ) * this.wander;
        this.vx += sin( this.theta ) * 0.1;
        this.vy += cos( this.theta ) * 0.1;

        this.radius *= 0.96;
        this.alive = this.radius > 0.5;
    },

    draw: function( ctx ) {

        ctx.beginPath();
        ctx.arc( this.x, this.y, this.radius, 0, TWO_PI );
        ctx.fillStyle = this.color;
        ctx.fill();
    }
};

// ----------------------------------------
// Example
// ----------------------------------------

var MAX_PARTICLES = 280;
var COLOURS = [ '#69D2E7', '#A7DBD8', '#E0E4CC', '#F38630', '#FA6900', '#FF4E50', '#F9D423' ];

var particles = [];
var pool = [];

var demo = Sketch.create({
    container: document.getElementById( 'container' )
});

demo.setup = function() {

    // Set off some initial particles.
    var i, x, y;

    for ( i = 0; i < 20; i++ ) {
        x = ( demo.width * 0.5 ) + random( -100, 100 );
        y = ( demo.height * 0.5 ) + random( -100, 100 );
        demo.spawn( x, y );
    }
};

demo.spawn = function( x, y ) {

    if ( particles.length >= MAX_PARTICLES )
        pool.push( particles.shift() );

    particle = pool.length ? pool.pop() : new Particle();
    particle.init( x, y, random( 5, 40 ) );

    particle.wander = random( 0.5, 2.0 );
    particle.color = random( COLOURS );
    particle.drag = random( 0.9, 0.99 );

    theta = random( TWO_PI );
    force = random( 2, 8 );

    particle.vx = sin( theta ) * force;
    particle.vy = cos( theta ) * force;

    particles.push( particle );
}

demo.update = function() {

    var i, particle;

    for ( i = particles.length - 1; i >= 0; i-- ) {

        particle = particles[i];

        if ( particle.alive ) particle.move();
        else pool.push( particles.splice( i, 1 )[0] );
    }
};

demo.draw = function() {

    demo.globalCompositeOperation  = 'lighter';
    
    for ( var i = particles.length - 1; i >= 0; i-- ) {
        particles[i].draw( demo );
    }
};

demo.mousemove = function() {

    var particle, theta, force, touch, max, i, j, n;

    for ( i = 0, n = demo.touches.length; i < n; i++ ) {

        touch = demo.touches[i], max = random( 1, 4 );
        for ( j = 0; j < max; j++ ) demo.spawn( touch.x, touch.y );
    }
};
</script>

<article id="info">
    <header>
        <h1><strong>sketch.js</strong> demo</h1>
        <h2>Spawn particles with your mouse</h2>
    </header>
    <a href="https://github.com/soulwire/sketch.js/zipball/master">Download</a>
    <a href="https://github.com/soulwire/sketch.js">View on Github</a>
</article>
<div id="container"></div>


<style>

    html, body {
    font-family: 'Play', sans-serif;
    background: #2b2b2b;
    margin: 0;
}

#info {
    position: absolute;
    left: 10px;
    top: 10px;
}

#info {
    background: rgba(0,0,0,0.8);
    padding: 12px 10px;
    margin-bottom: 1px;
    color: #fff;
}

#info h1 {
    line-height: 22px;
    font-weight: 300;
    font-size: 18px;
    margin: 0;
}

#info h2 {
    line-height: 14px;
    font-weight: 300;
    font-size: 12px;
    color: rgba(255,255,255,0.8);
    margin: 0 0 6px 0;
}

#info a {
    text-transform: uppercase;
    text-decoration: none;
    border-bottom: 1px dotted rgba(255,255,255,0.2);
    margin-right: 4px;
    line-height: 20px;
    font-size: 10px;
    color: rgba(255,255,255,0.5);
}

#info a:hover {
    border-bottom: 1px dotted rgba(255,255,255,0.6);
    color: rgba(255,255,255,1.0);
}
    
</style>
