import React from "react";

const Footer = () => (
    <footer className="footer sm:footer-horizontal bg-base-200 text-base-content p-10">
        <nav>
            <h6 className="footer-title">Services</h6>
            <a className="link link-hover" href="#">Branding</a>
            <a className="link link-hover" href="#">Design</a>
            <a className="link link-hover" href="#">Marketing</a>
            <a className="link link-hover" href="#">Advertisement</a>
        </nav>
        <nav>
            <h6 className="footer-title">Company</h6>
            <a className="link link-hover" href="#">About us</a>
            <a className="link link-hover" href="#">Contact</a>
            <a className="link link-hover" href="#">Jobs</a>
            <a className="link link-hover" href="#">Press kit</a>
        </nav>
        <nav>
            <h6 className="footer-title">Legal</h6>
            <a className="link link-hover" href="#">Terms of use</a>
            <a className="link link-hover" href="#">Privacy policy</a>
            <a className="link link-hover" href="#">Cookie policy</a>
        </nav>
        <form>
            <h6 className="footer-title">Newsletter</h6>
            <div className="join">
                <div className="join-item">
                    <label className="input validator join-item">
                    <svg className="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g
                        strokeLinejoin="round"
                        strokeLinecap="round"
                        strokeWidth="2.5"
                        fill="none"
                        stroke="currentColor"
                        >
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </g>
                    </svg>
                    <input type="email" placeholder="mail@site.com" required />
                    </label>
                    <div className="validator-hint hidden">Enter valid email address</div>
                </div>
                <button className="btn btn-primary join-item rounded-r-1xl">Join</button>
            </div>
        </form>
    </footer>
);

export default Footer;