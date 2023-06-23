import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import { useNavigate } from 'react-router-dom';
import axios from "axios";
import midtransClient from 'midtrans-client';

const snap = new midtransClient.Snap({
  isProduction: false,
  serverKey: 'SB-Mid-server-PcmuEJh0wr8UJm7v7O6cdw68',
  clientKey: 'SB-Mid-client-nDF1W4fVnwVOemix',
});

const Checkout = () => {
    const [carts, setCarts] = useState([]);
    const [total, setTotal] = useState(0);
    const [shippingCost, setShippingCost] = useState(0);

    const [services, setServices] = useState([]);
    const [loading, setLoading] = useState(true);
    const [wait, setWait] = useState(false);
    const [fullName, setFullName] = useState("");
    const [province, setProvince] = useState("");
    const [shippingService, setShippingService] = useState("");
    const [address, setAddress] = useState("");
    const [address2, setAddress2] = useState("");
    const [postcode, setPostcode] = useState("");
    const [phone, setPhone] = useState("");
    const [email, setEmail] = useState("");
    const [notes, setNotes] = useState("");

    useEffect(() => {
        axios.get("/carts").then((res) => {
            if (res.status === 200) {
                setCarts(Object.values(res.data.carts));
                setTotal(res.data.cart_total);
            }
            setLoading(false);
        });

        axios.get("/api/users").then((res) => {
            if (res.status === 200) {
                if (res.data.users.province_id != null) {
                    setProvince(res.data.users.province_id); // Mengubah setProvinceId menjadi setProvince
                }
                setFullName(
                    res.data.users.username == null
                        ? ""
                        : res.data.users.username
                );
                setAddress(
                    res.data.users.address == null ? "" : res.data.users.address
                );
                setAddress2(
                    res.data.users.address2 == null
                        ? ""
                        : res.data.users.address2
                );
                setPostcode(
                    res.data.users.postcode == null
                        ? ""
                        : res.data.users.postcode
                );
                setPhone(
                    res.data.users.phone == null ? "" : res.data.users.phone
                );
                setEmail(
                    res.data.users.email == null ? "" : res.data.users.email
                );
                setNotes(
                    res.data.users.notes == null ? "" : res.data.users.notes
                );
            }
            setLoading(false);
        });
    }, []);

    const handleClick = () => {
        window.location.href = '/pesanan/berhasil';
      };

    const handlePayment = async () => {
        const transactionToken = await fetchPaymentToken();
      
        window.snap.pay(transactionToken, {
          onSuccess: function(result) {
            // Aksi yang diambil ketika pembayaran berhasil
          },
          onPending: function(result) {
            // Aksi yang diambil ketika pembayaran masih dalam status tertunda
          },
          onError: function(result) {
            // Aksi yang diambil ketika terjadi kesalahan dalam pembayaran
          },
          onClose: function(){
            /* Anda dapat menambahkan implementasi Anda sendiri di sini */
            alert('Anda menutup popup tanpa menyelesaikan pembayaran');
          }
        });
    };

    const setShippingCostId = (service) => {
        setShippingService(service);
        setWait(false);

        let cost = 0;

        if (service === "cod") {
            cost = 0;
        } else if (service === "lokasi1") {
            cost = 10000;
        }

        setShippingCost(cost);
    };

    const placeOrder = (e) => {
        e.preventDefault();
        setWait(true);
        axios
            .post(`/api/checkout`, {
                fullName,
                province,
                shippingService,
                address,
                address2,
                postcode,
                phone,
                email,
                notes,
                shippingCost,
            })
            .then((res) => {
                setTotal(0);
                handlePayment();
                return null;
            });
    };

    return (
        <>
            <div className="checkout__htmlForm">
                <h4 className="mb-5">Detail Pembayaran</h4>
                <form onSubmit={placeOrder}>
                    <div className="row">
                        <div className="col-lg-8 col-md-6">
                            <div className="row">
                                <div className="col-lg-12">
                                    <div className="checkout__input">
                                        <p>
                                            Nama Lengkap<span>*</span>
                                        </p>
                                        <input
                                            type="text"
                                            value={fullName}
                                            onChange={(e) =>
                                                setFullName(e.target.value)
                                            }
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Pengiriman<span>*</span>
                                </p>
                                <select
                                    className="form-control"
                                    value={shippingService}
                                    onChange={(e) => setShippingCostId(e.target.value)}
                                    required
                                >
                                    <option value="cod">Bayar/Ambil Ditoko (tanpa Ongkir)</option>
                                    <option value="lokasi1">Diantar Dalam Kota (+10k)</option>
                                </select>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Alamat<span>*</span>
                                </p>
                                <input
                                    placeholder="Street Address"
                                    className="checkout__input__add"
                                    type="text"
                                    value={address}
                                    onChange={(e) => setAddress(e.target.value)}
                                />
                                <input
                                    type="text"
                                    value={address2}
                                    onChange={(e) =>
                                        setAddress2(e.target.value)
                                    }
                                    placeholder="nomor rumah, nama jalan atau detail alamat lainnya"
                                />
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Kode Pos<span>*</span>
                                </p>
                                <input
                                    type="text"
                                    value={postcode}
                                    onChange={(e) =>
                                        setPostcode(e.target.value)
                                    }
                                />
                            </div>
                            <div className="row">
                                <div className="col-lg-6">
                                    <div className="checkout__input">
                                        <p>
                                            Nomor Handphone<span>*</span>
                                        </p>
                                        <input
                                            type="text"
                                            value={phone}
                                            onChange={(e) =>
                                                setPhone(e.target.value)
                                            }
                                        />
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="checkout__input">
                                        <p>
                                            Email<span>*</span>
                                        </p>
                                        <input
                                            type="text"
                                            value={email}
                                            onChange={(e) =>
                                                setEmail(e.target.value)
                                            }
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Catatan Pesanan<span>*</span>
                                </p>
                                <input
                                    type="text"
                                    value={notes}
                                    onChange={(e) => setNotes(e.target.value)}
                                    placeholder="Catatan tentang pesanan kamu"
                                />
                            </div>
                        </div>
                        <div className="col-lg-4 col-md-6">
                            <div className="checkout__order">
                                <h4>Pesanan Kamu</h4>
                                <div className="checkout__order__products">
                                    Produk <span>Total</span>
                                </div>
                                <ul>
                                    {loading ? (
                                        <h3>Tunggu...</h3>
                                    ) : (
                                        carts.map((cart, index) => {
                                            return (
                                                <li key={index}>
                                                    {cart.name} ({cart.quantity}{" "}
                                                    x {cart.price})
                                                    <span>
                                                        Rp.
                                                        {cart.price *
                                                            cart.quantity}
                                                    </span>
                                                </li>
                                            );
                                        })
                                    )}
                                </ul>
                                <br />
                                <br />
                                <div className="checkout__order__total">
                                    Total <span>Rp. {total}</span>
                                </div>
                                <div className="checkout__order__total">
                                    Biaya Pengiriman <span>Rp. {shippingCost}</span>
                                </div>
                                <div className="checkout__order__total">
                                    Total Pesanan <span>Rp. {total + shippingCost}</span>
                                </div>
                                    <button type="submit" className="site-btn" onClick={handleClick}>
                                        PESAN SEKARANG
                                    </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </>
    );
};

export default Checkout;

if (document.getElementById("checkout")) {
    ReactDOM.render(<Checkout />, document.getElementById("checkout"));
}
