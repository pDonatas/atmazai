<?php

namespace App\Service;

use App\Entity\Evasion;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function MongoDB\BSON\toJSON;

class EvasionService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAllData()
    {
        return $this->em->getRepository(Evasion::class)->findAll();
    }

    public function getRandomData()
    {
        $conn = $this->em->getConnection();
        $sql = "SELECT * FROM evasion ORDER BY RAND() LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return($stmt->fetch());
    }

    public function findData($request)
    {
        $question = json_decode($request->getContent(), true)['question'];
        $conn = $this->em->getConnection();
        $sql = "SELECT * FROM evasion WHERE `Question` = ? ORDER BY RAND() LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$question]);
        if($stmt->rowCount() == 0){
            $sql = "SELECT * FROM evasion ORDER BY RAND() LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

        return($stmt->fetch());
    }
}
