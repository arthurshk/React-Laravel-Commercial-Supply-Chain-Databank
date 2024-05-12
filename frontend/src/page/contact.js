import React, { useState, useEffect } from 'react';
import Layout from '../component/layout/layout';
import './contact.css';

function Contact() {
  const [contactInfo, setContactInfo] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/contact') 
      .then((response) => response.json())
      .then((data) => {
        setContactInfo(data);
        console.log('Contact Info:', data);
      })
      .catch((error) => {
        console.error('Error fetching contact info:', error);
      });
  }, []);

  return (
    <Layout>
      <div className="contact-container">
        <h2>Contact Us</h2>
        <p>
          Happy Shopping! For any inquiries or concerns, please contact us through the provided email, phone, or mail P.O. BOX
        </p>
        <div className="contact-info">
      {contactInfo.map((contact, index) => (
        <div className="contact-item" key={index}>
        <h3>Email</h3>
      <p>{contact.email}</p>
      
      <h3>Phone</h3>
      <p>{contact.phone}</p>
      
      <h3>Address</h3>
      <p>{contact.address}</p>
     </div>
    ))}
    </div>
      </div>
    </Layout>
  );
}

export default Contact;