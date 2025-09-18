import React from 'react';
import Header from '../Components/App/Header';
import Footer from '../Components/App/Footer';
import { Routes, Route } from "react-router";
import Home from '../Pages/Home';
import Login from '../Pages/Login';
import Register from '../Pages/Register';

const DefaultLayout = () => {
    return (
        <>
            <Header />
            <Routes>
                <Route index element={<Home />} />

                <Route>
                    <Route path="login" element={<Login />} />
                    <Route path="register" element={<Register />} />
                </Route>

            </Routes>
            <Footer />
        </>
    );
};

export default DefaultLayout;