<!-- Contact -->
<style>
    .img-text{
        width: 100%;
        height: 300px;
        display: block;
        text-align: center;
        padding: 40% 5%;
        border-radius: 15px;
        background: #ffff;
    }
    .img-text h2{
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    .img-text p{
        font-size: 14px;
    }
    .img-area{
        position: absolute;
        width: 100px;
        height: 100px;
        border: 5px solid grey;
        overflow: hidden;
        top: 15px;
        left: 140px;
        border-radius: 50%;

    }
    .img-area img{
        width: 100%;
        height: 100%;
    }
    .carousel-indicators{
        left: 0;
        top: auto;
        bottom: -70px;
    }
    .carousel-indicators li{

        border-radius: 50px;
        width: 15px;
        height: 15px;
    }

</style>
<div class="Contact">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      </ol>

                      <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="img-area"><img src="{{asset('/images/Home')}}/images.jfif" alt=""></div>
                                        <div class="img-text">
                                            <h2>Emma Watson</h2>
                                            <p>"What gets scary is when your self-worth is tied up in what strangers think of you"</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="img-area"><img src="{{asset('/images/Home')}}/01.jfif" alt=""></div>
                                        <div class="img-text">
                                            <h2>Bill Gate</h2>
                                            <p>“Don't compare yourself with anyone in this world… if you do so, you are insulting yourself.”</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="img-area"><img src="{{asset('/images/Home')}}/download.jfif" alt=""></div>
                                        <div class="img-text">
                                            <h2>Steve Jobs</h2>
                                            <p>"Have the courage to follow your heart and intuition. They somehow know what you truly want to become."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="img-area"><img src="{{asset('/images/Home')}}/04.jfif" alt=""></div>
                                        <div class="img-text">
                                            <h2>Mark Zuckerberg</h2>
                                            <p>"The question I ask myself like almost every day is, 'Am I doing the most important thing I could be doing?"</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="img-area"><img src="{{asset('/images/Home')}}/05.jfif" alt=""></div>
                                        <div class="img-text">
                                            <h2>Jeff Bezos</h2>
                                            <p>"If you double the number of experiments you do per year you’re going to double your inventiveness."</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="img-area"><img src="{{asset('/images/Home')}}/06.jfif" alt=""></div>
                                        <div class="img-text">
                                            <h2>Donald Trump</h2>
                                            <p>"I like thinking big. If you're going to be thinking anything, you might as well think big"</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                      </div>
                    </div>
                 </div>
              </div>
        </div>
</div>
     <!-- end Contact -->
