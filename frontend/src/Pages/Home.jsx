import React from "react";

const Home = () => {
    return (
        <div className="min-h-screen flex flex-col items-center justify-center bg-base-200">
            <div className="card w-96 bg-base-100 shadow-xl">
                <div className="card-body items-center text-center">
                    <h2 className="card-title text-primary">Welcome to the Home Page!</h2>
                    <p className="text-base-content">
                        This is a sample home page built with React and daisyUI.
                    </p>
                    <div className="card-actions mt-4">
                        <button className="btn btn-primary">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Home;