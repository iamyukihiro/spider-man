<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Command;

use Goreboothero\SpiderMan\Infrastructure\Datastore\FishingEnvironmentalDataLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetFishingEnvironmentalDataCommand extends Command
{
    protected static $defaultName = 'app:get-fishing-env';

    protected function configure(): void
    {
        $this->setHelp('釣行日時と場所を指定して、当日の環境情報を取得します。');

//        $this->addArgument('date', InputArgument::REQUIRED, '釣行日時 ／ (例)：2022-01-01');
//        $this->addArgument('prefecture', InputArgument::REQUIRED, '県名 (県、府は含めない) ／ (例)：大阪');
//        $this->addArgument('fishing-place', InputArgument::REQUIRED, '釣行場所 ／ (例)：鳥取港');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // TODO: Fetchロジックの実装

        $fishingEnvironmentalDataLoader = new FishingEnvironmentalDataLoader();
        $fishingEnvironmentalData = $fishingEnvironmentalDataLoader->connect();

        dd($fishingEnvironmentalData);

        return Command::SUCCESS;
    }
}
