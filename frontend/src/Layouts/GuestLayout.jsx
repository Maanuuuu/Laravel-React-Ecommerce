import React from 'react';
import Header from '../Components/App/Header';
import Footer from '../Components/App/Footer';
import FullInput from '../Components/Core/Full-Input';
import SimpleInput from '../Components/Core/Simple-Input';
const DefaultLayout = ({ children }) => {
    return (
        <div className="default-layout min-h-screen flex flex-col" style={{ backgroundColor: '#f3f4f6' }}>
            <Header />
            <main className="container flex-1">
                {children}
            </main>
            <Footer />
        </div>
    );
};

export default DefaultLayout;