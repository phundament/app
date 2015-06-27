
.PHONY: dockerhost-cleanup
dockerhost-cleanup:	##@docker /!\ EXPERIMENTAL
	docker rmi `docker images -f "dangling=true" -q
	docker run -v /var/run/docker.sock:/var/run/docker.sock -v /var/lib/docker:/var/lib/docker --rm martin/docker-cleanup-volumes
