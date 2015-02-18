VERSION=`git describe --tags``test -z "$(git status --porcelain)" || echo "-dirty"`
echo $VERSION > version

docker build -f Dockerfile-production -t myapp-production .
docker build -f Dockerfile -t myapp-development .