import React, { useState, useEffect } from 'react';
import Layout from '../component/layout/layout';
import './deliveryPayment.css'; 

function DeliveryPayment() {
  const [deliveryMethods, setDeliveryMethods] = useState([]);
  
  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/deliveryPayment') 
      .then((response) => response.json())
      .then((data) => {
        setDeliveryMethods(data);
      })
      .catch((error) => {
        console.error('Error fetching delivery methods:', error);
      });
  }, []);

  return (
    <Layout>
      <div className="delivery-payment-container">
        <h2>Delivery/Payment</h2>
        <div className="delivery-methods">
          {deliveryMethods.map((method, index) => (
            <div key={index} className="delivery-method">
              <h3>{method.speed}</h3>
              <p>{method.type}</p>
              <p>Cost: {method.price}</p>
            </div>
          ))}
        </div>
        <div className="payment-options">
          <h3>Payment Options</h3>
          <ul>
            <li>Credit Card</li>
            <li>PayPal</li>
            <li>Apple Pay</li>
          </ul>
        </div>
        {/* <button className="proceed-button">Proceed to Payment</button> */}
      </div>
    </Layout>
  );
}

export default DeliveryPayment;