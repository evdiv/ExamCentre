<footer class="footer">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-6"><span class="text-muted">2019 {{ config('app.name') }}</span></div>

    		<div class="col-sm-6 text-right footer-menu">
    			
                @guest
                    
                    <a class="text-muted" href="{{ route('register') }}">{{ __('Register') }}</a>&nbsp;&nbsp;&nbsp; 
                    <a class="text-muted" href="{{ route('login') }}">{{ __('Login') }}</a>&nbsp;&nbsp;&nbsp; 
                   
                @else
                    
                    <a class="text-muted" href="/lessons/">My Lessons</a>&nbsp;&nbsp;&nbsp; 
                    <a class="text-muted" href="/account/">Settings</a>&nbsp;&nbsp;&nbsp; 

                @endguest
                
                    <a class="text-muted" href="/help">Help</a>
                

    		</div>
    	</div>
        

    </div>
</footer>