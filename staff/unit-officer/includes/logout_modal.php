<!-- Logout Modal -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="be/logout.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title logout-modal-title">Proceed with logout?</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body logout-modal-body">
                                    <p>Select "Logout" below if you are ready to end your current session.</p>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                  <button class="btn btn-primary" name="logout">Logout</button>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>