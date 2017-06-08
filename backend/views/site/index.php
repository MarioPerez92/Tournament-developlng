<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

 
 <div class="container_home">
                        <div class="site-index ">
  <div class="row home-top">
      <div class="col-md-6 col-md-offset-1">
        <div class="jumbotron">
            <h1>Welcome!</h1>
                <p class="lead">The difference between success and  failure is a great team.</p>
                <div class="centered">
                  <p><a class="btn btn-lg btn-success" href="/es/site/signup" title="Programe su primera reunión">Get started</a></p>
                </div>
          </div> <!-- end jumbo -->
      </div>



      <div class="col-md-3 ">
          <div class="panel panel-default">
              <div class="panel-heading" style="font-size:1.33em;">
                <strong>Start tournament</strong>
              </div>
              <div class="panel-body panel-auth-clients centered">
                  <div id="w0" class="auth-clients">                Start instantly with any of these services:<br /><br />
                <ul class="auth-clients" >
                                    <li class="auth-client"><a class="facebook auth-link" 
                                    href="/site/auth?mode=signup&amp;authclient=facebook">
                                    <span class="auth-icon facebook"></span>
                                    <span class="auth-title">Facebook</span>
                                    </a>
                                    </li>
                                    <li class="auth-client"><a class="google auth-link" 
                                    href="/site/auth?mode=signup&amp;authclient=google">
                                    <span class="auth-icon google"></span>
                                    <span class="auth-title">Google</span>
                                    </a>
                                    </li>
                                    <li class="auth-client"><a class="linkedin auth-link" 
                                    href="/site/auth?mode=signup&amp;authclient=linkedin">
                                    <span class="auth-icon linkedin"></span>
                                    <span class="auth-title">LinkedIn</span>
                                    </a>
                                    </li>
                                    
                 </ul>
                </div>              
                </div>
              <div class="panel-footer">
                  Or, <a href="/es/site/signup">Sign up using your email address.</a>     

                  </div>
          </div>
      </div>
  </div>
</div>
</div>