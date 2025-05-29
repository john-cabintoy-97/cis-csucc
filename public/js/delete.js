var host = window.location.pathname;
var dir = host.substring(0, host.lastIndexOf("/"));

const deleteCollege = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class', // Add your custom CSS class here
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_college=item&college_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class', // Add your custom CSS class here
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const deleteCourse = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_course=item&course_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const deleteOffice = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_office=item&office_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}


const deleteIllness = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_illness=item&illness_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}


const deleteMedicine = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_medicine=item&medicine_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const deleteStudent = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_student=item&student_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const deleteFaculty = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_faculty=item&faculty_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const deleteEmployee = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_employee=item&employee_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const deleteEquipment = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_equipment=item&equipment_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}


const deleteInvMedicine = async (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const path = "../ajax/admin/delete.php";
            fetch(path, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "delete_inv_medicine=item&medicine_id=" + id,
            })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    data = data.trim();
                    console.log(data)
                    if (data == "delete") {
                        Swal.fire({
                            title: 'Your item has been deleted.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            customClass: {
                                container: 'custom-success-class',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(console.error);
        }
    });
}

const cislogout = (id) => {
    Swal.fire({
        title: "Are you sure you want to logout?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Logging out...'
            })

            const url = new URL(window.location.href);
            const pathParts = url.pathname.split('/');
            const basePath = pathParts[1];

            const logoutURL = `${url.origin}/${basePath}/logout/id/${id}`;

            setTimeout(() => {
                location.href = logoutURL;
            }, 1000);
        }
    });
}

const cis_logout = (id) => {
    Swal.fire({
        title: "Are you sure you want to logout?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        customClass: {
            container: 'custom-modal-class',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Logging out...'
            })

            const url = new URL(window.location.href);
            const pathParts = url.pathname.split('/');
            const basePath = pathParts[1];

            const logoutURL = `${url.origin}/${basePath}/logout_u/id/${id}`;

            setTimeout(() => {
                location.href = logoutURL;
            }, 1000);
        }
    });
}
