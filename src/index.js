const { default: User } = require("../resources/js/components/Headline");

<Router>                        
   <Header/>
     <Switch>
         <Route exact path="/" component={User} />
       </Switch>
    <Footer/>
</Router>