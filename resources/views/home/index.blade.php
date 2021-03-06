@extends('layouts.app')

@section('title', config('app.name'))

@section('styles')
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            /*font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;*/
            /*font-family: 'Lato', sans-serif;*/
            font-family: 'Raleway', "lato-regular", "Helvetica Neue", Helvetica, Arial, "Hiragino Sans GB", "Microsoft YaHei", sans-serif;
        }
        #particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        .home-main{
            align-items: center;
            display: flex;
            justify-content: center;
            position: relative;
            background-color: #fff;
            color: rgba(31, 31, 31, .7);
            font-weight: 200;
            height: 100%;
            overflow: hidden;
        }
        .content {
            text-align: center;
            z-index: 100;
            margin-bottom: 15vh;
        }
        .title {
            font-size: 45px;
            line-height: 1em;

        }
        .description {
            margin: 30px 0;
            font-size: 20px;
            line-height: 1em;
            letter-spacing: .05em;
        }
        .links > a {
            display: inline-block;
            color: rgba(31, 31, 31, .6);
            background-color: white;
            padding: 8px 20px;
            border-radius: 22px;
            border: 1px solid rgba(31, 31, 31, 0.2);
            font-size: 13px;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            margin: 0 10px;
        }
        .links > a:hover {
            color: #1abc9c;
        }
    </style>
@endsection

@section('body')
<div class="home-main">
    <div id="particles"></div>
    <div class="content">
        <div class="title">
            {{ config('blog.article.title') }}
        </div>
        <div class="description">
            {{ config('blog.article.description') }}
        </div>
        <div class="links">
            <a href="{{ url('articles') }}">My Blog</a>
            @if(config('blog.footer.github.open'))
                <a target="_blank" href="{{ config('blog.footer.github.url') }}">GitHub</a>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="//cdn.bootcss.com/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles", {
        "particles": {
            "number": {
                "value": 10,
                "density": {
                    "enable": true, "value_area": 800
                }
            },
            "color": {
                "value": "#52697f"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 200,
                    "height": 200
                }
            },
            "opacity": {
                "value": 0.1,
                "random": false,
                "anim": {
                    "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false
                }
            },
            "size": {
                "value": 20,
                "random": true,
                "anim": {
                    "enable": false, "speed": 20, "size_min": 0.1, "sync": false
                }
            },
            "line_linked": {
                "enable": true, "distance": 1000, "color": "#52697f", "opacity": 0.2, "width": 1
            },
            "move": {
                "enable": true,
                "speed": 4,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false, "rotateX": 600, "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas", "events": {
                "onhover": {
                    "enable": false, "mode": "grab"
                },
                "onclick": {
                    "enable": false, "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 140, "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3
                },
                "repulse": {
                    "distance": 200, "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
</script>
@endsection