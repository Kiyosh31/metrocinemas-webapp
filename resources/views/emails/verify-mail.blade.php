<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">
                        Haga click en el boton de abajo para activar su cuenta
                    </h3>
    
                    <a href="{{ url('/verifyemail/' . $email_token) }}" class="btn btn-primary">Activar cuenta</a>
                    
                </div>
            </div>
        </div>
    </div>