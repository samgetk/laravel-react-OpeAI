import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import Form from 'react-bootstrap/Form'
import Button from 'react-bootstrap/Button'
import Row from 'react-bootstrap/Row';
import axios from 'axios';



export default function Headline() {


    const [search, setSearch] = useState("")

    useEffect(()=>{
      fetchHeadlines()
    },[])

    const fetchHeadlines = async () => {
      

      const response = await axios.get('/api/search/').then(({data})=>{
        setSearch(data)
      console.log(response);

          } )
           }

 

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card ">
                        <div className="card-header"><h5>Headline</h5></div>
                        <div className="card-body"><div class="input-group">
                        <Form onSubmit={fetchHeadlines}>
                            <Row>
                            
                            <Form.Group controlId="search">
                            <Form.Label>Title</Form.Label>
                            <Form.Control type="text" value={search} onChange={(event)=>{
                              setSearch(event.target.value)
                            }}/>
                            
                        </Form.Group>
                             <Button variant="primary" onClick={fetchHeadlines} className="mt-2" size="lg"  type="submit">
                    Search
                  </Button>  
                            </Row>
  
  </Form>
</div></div>
                    </div>
                </div>
            </div>
        </div>
    );
   

}
// DOM element
if (document.getElementById('headline')) {
    ReactDOM.render(<Headline />, document.getElementById('headline'));
}