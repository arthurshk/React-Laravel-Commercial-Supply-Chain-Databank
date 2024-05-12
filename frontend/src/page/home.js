import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import goldTable from '../image/goldTable.jpg';
import redSofa from '../image/redSofa.jpg';
import matressSet from '../image/matressSet.jpg';
import Layout from '../component/layout/layout';
import Info from '../component/header/header_top/info.js'
import './home.css';

function Home() {
  return (
    <Layout>
      <div className="home-container">
        <Info />
      </div>
      <div className="simple-carousel-container">
        <Swiper
          spaceBetween={10}
          slidesPerView={1}
          navigation={true}
          pagination={{ clickable: true }}
          autoplay={{ delay: 400 }}
          loop={true}
        >
          <SwiperSlide>
            <div className="slider-item">
            <img src={redSofa} alt="Red Sofa" />
              <h1>Sofas</h1>
            </div>
          </SwiperSlide>
          <SwiperSlide>
            <div className="slider-item">
            <img src={goldTable} alt="Gold Table" />
              <h1>Tables</h1>
            </div>
          </SwiperSlide>
          <SwiperSlide>
            <div className="slider-item">
              <img src={matressSet} alt="Mattress Set" />
              <h1>Matresses</h1>
            </div>
          </SwiperSlide>
        </Swiper>
        <div className="swipe-indicator">
          <span>Swipe Left</span>
          <span>Swipe Right</span>
        </div>
      </div>
    </Layout>
  );
}

export default Home;