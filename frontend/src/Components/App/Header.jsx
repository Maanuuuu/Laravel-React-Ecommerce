import React from 'react';

const Header = () => {
    return (
        <header className="navbar bg-white shadow-sm">
            <div className="flex-1">
                <a className="btn btn-ghost text-xl text-gray-800">LaraShop</a>
            </div>
            <nav className="flex-none flex items-center gap-8">
                {/* Cart Dropdown */}
                <div className="dropdown dropdown-end">
                    <button tabIndex={0} className="btn btn-ghost btn-circle" aria-label="Cart">
                        <div className="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span className="badge badge-sm indicator-item bg-blue-100 text-blue-700">8</span>
                        </div>
                    </button>
                    <div tabIndex={0} className="card card-compact dropdown-content bg-white z-1 mt-3 w-52 shadow">
                        <div className="card-body">
                            <span className="text-lg font-bold text-gray-800">8 Items</span>
                            <span className="text-blue-600">Subtotal: $999</span>
                            <div className="card-actions">
                                <button className="btn btn-primary btn-block bg-blue-500 text-white border-none">View cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                {/* Profile Dropdown */}
                <div className="dropdown dropdown-end">
                    <button tabIndex={0} className="btn btn-ghost btn-circle avatar" aria-label="Profile">
                        <div className="w-10 rounded-full border border-gray-200">
                            <img
                                alt="User avatar"
                                src="https://img.daisyui.com/images/profile/demo/batperson@192.webp"
                            />
                        </div>
                    </button>
                    <ul tabIndex={0} className="menu menu-sm dropdown-content bg-white rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <a className="justify-between text-gray-800">
                                Profile
                                <span className="badge bg-green-100 text-green-700">New</span>
                            </a>
                        </li>
                        <li><a className="text-gray-800">Settings</a></li>
                        <li><a className="text-gray-800">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
    );
};

export default Header;
