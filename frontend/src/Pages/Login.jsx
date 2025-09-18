import React, { useState } from "react";
import { useNavigate } from "react-router";

const Login = () => {
    const [form, setForm] = useState({ email: "", password: "" });
    const navigate = useNavigate();

    const handleChange = (e) => {
        setForm({ ...form, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(form);
        navigate("/");
    };

    return (
        <div className="flex items-center justify-center min-h-screen bg-base-200">
            <div className="w-full max-w-md p-8 shadow-lg rounded-lg bg-base-100">
                <h2 className="text-2xl font-bold mb-6 text-center">Login</h2>
                <form onSubmit={handleSubmit}>
                    <div>
                        <fieldset className="fieldset">
                            <legend className="fieldset-legend">Email</legend>
                            <input
                                className="input validator"
                                value={form.email}
                                type="email"
                                required
                                placeholder="mail@site.com"
                                onChange={handleChange}
                                name="email"
                            />
                            <div className="validator-hint">Enter valid email address</div>
                        </fieldset>
                    </div>

                    <div className="mb-6">
                        <fieldset className="fieldset">
                            <legend className="fieldset-legend">Password</legend>
                            <input
                                type="password"
                                className="input validator"
                                required
                                placeholder="Password"
                                value={form.password}
                                onChange={handleChange}
                                name="password"
                            />
                        </fieldset>
                    </div>

                    <button type="submit" className="btn btn-primary w-full">
                        Login
                    </button>
                </form>
            </div>
        </div>
    );
};

export default Login;