import React, { useState } from "react";

const Register = () => {
    const [form, setForm] = useState({
        name: "",
        email: "",
        password: "",
        confirmPassword: "",
    });

    const [error, setError] = useState("");

    const handleChange = (e) => {
        setForm({ ...form, [e.target.name]: e.target.value });
        setError("");
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        if (form.password !== form.confirmPassword) {
            setError("Passwords do not match");
            return;
        }
        // Submit logic here
        console.log(form);
    };

    return (
        <div className="flex items-center justify-center min-h-screen bg-base-200">
            <div className="w-full max-w-md p-8 shadow-lg rounded-lg bg-base-100">
                <h2 className="text-2xl font-bold mb-6 text-center">Register</h2>
                <form onSubmit={handleSubmit}>
                    <div>
                        <fieldset className="fieldset">
                            <legend className="fieldset-legend">Name</legend>
                            <input className="input validator" value={form.name} type="text" required placeholder="Your Name" onChange={handleChange} name="name" />
                            <div className="validator-hint">Enter your full name</div>
                        </fieldset>
                    </div>

                    <div>
                        <fieldset className="fieldset">
                            <legend className="fieldset-legend">Email</legend>
                            <input className="input validator" value={form.email} type="email" required placeholder="mail@site.com" onChange={handleChange} name="email" />
                            <div className="validator-hint">Enter valid email address</div>
                        </fieldset>
                    </div>

                    <div className="mb-6">
                        <fieldset className="fieldset">
                            <legend className="fieldset-legend">Password</legend>
                            <div className="flex items-center gap-2">
                                <input 
                                    type="password" className="input validator flex-1" required placeholder="Password" minLength="8" 
                                    pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$"  value={form.password} onChange={handleChange} name="password"
                                    title="Must be at least 8 characters, including at least one letter, one number, and one special character" 
                                />
                                {/* Info icon to open modal */}
                                <button
                                    type="button"
                                    className="btn btn-ghost btn-circle"
                                    onClick={() => document.getElementById('password_info_modal').showModal()}
                                    aria-label="Password requirements"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="2" fill="none"/>
                                        <path stroke="currentColor" strokeWidth="2" d="M12 16v-4m0-4h.01" />
                                    </svg>
                                </button>
                            </div>
                        </fieldset>
                    </div>

                    <div className="mb-4">
                        <fieldset className="fieldset">
                            <legend className="fieldset-legend">Confirm Password</legend>
                            <input 
                                type="password" value={form.confirmPassword} className="input" required placeholder="Password" minLength="8" 
                                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$" onChange={handleChange} name="confirmPassword"
                                title="Must be at least 8 characters, including at least one letter, one number, and one special character" 
                            />
                        </fieldset>
                    </div>

                    {/* DaisyUI Modal for password requirements */}
                    <dialog id="password_info_modal" className="modal">
                        <div className="modal-box flex flex-col items-center">
                            <div className="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-10 w-10 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="2" fill="none"/>
                                    <path stroke="currentColor" strokeWidth="2" d="M12 16v-4m0-4h.01" />
                                </svg>
                            </div>
                            <h3 className="font-bold text-lg mb-2 text-info">Password Requirements</h3>
                            <ul className="list-disc list-inside text-left text-sm mb-4">
                                <li>At least 8 characters</li>
                                <li>At least one letter</li>
                                <li>At least one number</li>
                                <li>At least one special character (!@#$%^&*)</li>
                            </ul>
                            <form method="dialog">
                                <button className="btn btn-info">Close</button>
                            </form>
                        </div>
                    </dialog>

                    {error && (
                        <div className="text-error mb-4 text-sm">{error}</div>
                    )}
                    <button type="submit" className="btn btn-primary w-full">
                        Register
                    </button>
                </form>
            </div>
        </div>
    );
};

export default Register;