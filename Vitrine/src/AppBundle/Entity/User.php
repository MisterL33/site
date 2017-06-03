<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    public function __construct()
    {
        parent::__construct();
        $this->customers = new ArrayCollection();
    }
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Customer", mappedBy="user")
     */
    protected $customers;
 

 
    /**
     * Add customers
     *
     * @param \AppBundle\Entity\Customer $customers
     * @return User
     */
    public function addCustomer(\AppBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;
 
        return $this;
    }
 
    /**
     * Remove customers
     *
     * @param \AppBundle\Entity\Customer $customers
     */
    public function removeCustomer(\AppBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }
 
    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers()
    {
        return $this->customers;
    }
}
