<?php

namespace App\Model;

class User
{

    /**
     * [$id primary key holder]
     *
     * @var [int]
     */
    private $id;

    /**
     * [$firstname Users first name]
     *
     * @var [string]
     * VARCHAR(100)
     * NOT NULL
     */
	private $firstName;

    /**
     * [$lastname Users last name]
     *
     * @var [string]
     * VARCHAR(100)
     * NOT NULL
     */
    private $lastName;

    /**
     * [$email Users email address, used for corrospondence]
     *
     * @var [string]
     * VARCHAR(255)
     * NOT NULL
     */
    private $email;

    /**
     * [$mobilephone Users contact phone number]
     *
     * @var [string]
     * VARCHAR(20)
     */
    private $mobilePhone = null;

    /**
     * [$admin Flag for if user has admin access]
     *
     * @var [Boolean]
     */
    private $admin = 0;


    public function __construct(int $id, string $firstName, string $lastName, string $email, string $mobilePhone=null, bool $admin=0  )
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->mobilePhone = $mobilePhone;
        $this->admin = $admin;
    }

     public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->firstName." ".$this->lastName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    public function isAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }




}